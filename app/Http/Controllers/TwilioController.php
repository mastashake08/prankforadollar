<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio;
use App\Http\Requests;
use App\Events\PrankSentEvent;
class TwilioController extends Controller
{
    //
    public function makeCall(Request $request){

      // Create the charge on Stripe's servers - this will charge the user's card
try {
  \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  $charge = \Stripe\Charge::create(array(
    "amount" => 100, // amount in cents, again
    "currency" => "usd",
    "source" => $request->stripeToken,
    "description" => "https://prankforadollar.com prank call."
    ));
    event(new PrankSentEvent($request));
    return view('message-complete');
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
  abort(503);
}

    }
}
