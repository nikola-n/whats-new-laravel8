<?php

//laravel 7.x and below

use App\Events\GiftCertificatePurchased;
use Illuminate\Support\Facades\Event;
use function Illuminate\Events\queueable;

//Event::listen(GiftCertificatePurchased::class, function (GiftCertificatePurchased $event){
//    dd('handling it');
//});
//In laravel 7 there was no easy way to queue your event listener with this approach

//in laravel 8.x we can simplify it
//There is a queueable function that can queue the event

Event::listen(queueable(function (GiftCertificatePurchased $event) {
    dd($event);
}));
