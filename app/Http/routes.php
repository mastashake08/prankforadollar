<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('make-call', 'TwilioController@makeCall');
Route::get('terms', function(){
  return view('terms');
});
Route::get('about-developer', function(){
  return view('developer');
});
Route::get('xml', function(){

$string =  <<<XML
<Response>
    <Say voice="woman" language="en">The police are idiots! Do us all a favor and just quit! You are a waste of air and tax dollars!</Say>
    <Record timeout="10" transcribe="true" />
</Response>
XML;

$xml = new SimpleXMLElement($string);

return $xml->asXML();
});
