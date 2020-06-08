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

        Notification::route('mail', 'admin@test.com')->notify(new Report($content, $motif));

        //msg de validation

        return redirect('/annonces');
    }


    public function alerte(Request $request)
    {

/*
        $request->validate([
            'type' => 'requiered|string',
            'content' => 'requiered|string',
        ]),

        $post = new Post();
        $post->type = $request->type;
        $post->content = $request->content;
        $post->save();

        $post = (new MailMessage)
            ->from('test@example.com', 'Example')
            ->subject('Notification Subject')
            ->greeting('Bonjour')
            ->line('The introduction to the notification. t')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application! t');
*/

        $post = "bjr";

        Notification::route('mail', 'gwendallefort@gmail.com')->notify(new Alerte($post));
    }
}