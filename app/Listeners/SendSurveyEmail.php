<?php

namespace App\Listeners;

use App\Events\NewSurvey;
use App\Mail\NotiMail;
use App\Models\Survey;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSurveyEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewSurvey $event): void
    {

        Mail::to('wailwinaung228@gmail.com')->send(new NotiMail());

    }
}
