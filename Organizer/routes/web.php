<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/AccountManagement', function () {
    return view('AccountManagement');
});

Route::get('/EventManagement', function () {
    return view('EventManagement');
});

Route::get('/DealershipManagement', function () {
    return view('DealershipManagement');
});

Route::get('/VenueManagement', function () {
    return view('VenueManagement');
});

Route::get('/CrewManagement', function () {
    return view('CrewManagement');
});

Route::get('/Calendar', function () {
    return view('Calendar');
});