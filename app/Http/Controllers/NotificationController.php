<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Notification;
use App\Notifications\Alerte;
use App\Notifications\Report;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function recupNotif() {

        $notifs = DB::table('notifications')->get();

        dd($notifs);
    }

    public function report(Request $request) {

        $content = $request->content;
        $motif = $request->motif;
        $id_advert = $request->id;

        // augmente le nombre de signalement
        $advert = DB::table('advertisement')
            ->where("id", "=", $id_advert)
            ->select('nbReport')
            ->get();
        $a["nbReport"] = $advert[0]->nbReport +1;

        DB::table('advertisement')
          ->where('id', $id_advert)
          ->update($a);

        Notification::route('mail', 'noreply.wgy@gmail.com')->notify(new Report($content, $motif, $id_advert));

        return redirect("/annonces?type=Cours")->with(['message' => 'L\'annonce a bien été signalée !']);
    }

    public function alerte($users, $alertes, $advert_id) {

        foreach($alertes as $key => $data) {
            if($users[$key]->notif_alerte == 1)
                Notification::send($users[$key], new Alerte($data->type, $data->act, $data->place, $advert_id));
        }
    }

    public function addAlerte(Request $request) {

        $id = DB::table('alerte')->insertGetId([
            'type' => $request->alerte["type"],
            'act' => $request->alerte["act"], 
            'place' => $request->alerte["place"], 
            'user_id' => Auth::user()->id,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        $object = (object) [
            'type' => $request->alerte["type"],
            'act' => $request->alerte["act"],
            'place' => $request->alerte["place"],
            'id' => $id
        ];


        return view('components/alerte')->with('alerte', $object);
    }

    public function removeAlerte(Request $request) {

        DB::table('alerte')
            ->where('id', $request->id)
            ->delete();

        return $request;
    }

    public function getAlertes() {


        if(Auth::user()) {
            $alertes = DB::table('alerte')
                ->join('users', 'alerte.user_id', '=', 'users.id')
                ->where("alerte.user_id", "=", Auth::user()->id)
                ->select('alerte.*')
                ->get();
        }

        return $alertes;
    }

    public function displayAlerte(Request $request) {
        $alerte = DB::select('select * from alerte where id ='.$request->id);
        $alerte = $alerte[0];
        return view('components/alerte')->with('alerte', $alerte);
    }
}