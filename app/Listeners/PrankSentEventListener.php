<?php

namespace App\Listeners;

use App\Events\PrankSentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrankSentEventListener 
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
     * @param  PrankSentEvent  $event
     * @return void
     */
    public function handle(PrankSentEvent $event)
    {
        //
        $twilio = new \Aloha\Twilio\Twilio(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_FROM'));
        $twilio->call($event->request->phone, function ($message) use($event) {
          $message->play('http://www.xamuel.com/blank-mp3-files/2sec.mp3', ['loop' => 1]);
          $message->say($event->request->message);
          $message->play('http://clipart.usscouts.org/ScoutDoc/SeaExplr/WavFiles/SHIPBELL/TBELL2.WAV', ['loop' => 1]);
          $message->say('You have just been pranked by prank for a dollar dot com!');
        });
    }
}
