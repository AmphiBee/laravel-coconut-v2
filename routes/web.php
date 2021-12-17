<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Nidhalkratos\LaravelCoconut\Events\CoconutNotificationReceived;

Route::get('/coconut/callback/{videoId}', function($videoId, Request $request){
    $body = $request->getContent();
    $webhook = json_decode($body, true);
    event(new CoconutNotificationReceived($videoId,$webhook));
})->name('coconut.callback');