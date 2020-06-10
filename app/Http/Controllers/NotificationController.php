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
}