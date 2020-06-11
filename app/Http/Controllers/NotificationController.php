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

class NotificationController extends Controller
{

    public function recupNotif() {

        $notifs = DB::table('notifications')->get();

        dd($notifs);
    }

    public function report(Request $request) {

        $content = $request->content;
        $motif = $request->motif;
        $id = $request->id;

        Notification::route('mail', 'admin@test.com')->notify(new Report($content, $motif, $id));

        //msg de validation

        return redirect('/annonces');
    }

    public function addAlerte(Request $request) {

        $id = DB::table('alerte')->insertGetId([
            'type' => $request->alerte["type"],
            'act' => $request->alerte["act"], 
            'place' => $request->alerte["place"], 
            'user_id' => 1, 
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
        $alertes = DB::table('alerte')->get();
        return $alertes;
    }

    public function displayAlerte(Request $request) {
        $alerte = DB::select('select * from alerte where id ='.$request->id);
        $alerte = $alerte[0];
        return view('components/alerte')->with('alerte', $alerte);
    }
}