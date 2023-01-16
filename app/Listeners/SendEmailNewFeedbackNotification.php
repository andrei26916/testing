<?php

namespace App\Listeners;

use App\Events\CreateFeedback;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNewFeedbackNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateFeedback  $event
     * @return void
     */
    public function handle(CreateFeedback $event)
    {
        $role = Role::with('users')->where('slug', 'admin')->first();

        if ($role){
            foreach ($role->users as $user){
                Mail::send(
                    ['text' => view('Mail.CreateFeedbackNotification', ['feedback' => $event->feedback])],
                    ['name' => 'New Feedback'],
                    function ($message) use ($user) {
                        $message->to($user->email, 'Gust Book')->subject('New Feedback');
                        $message->from('developerGustBook@mail.ru', 'Gust Book');
                    }
                );
            }
        }
    }
}
