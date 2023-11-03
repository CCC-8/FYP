<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/Events', function () {
    return view('Events');
});

Route::get('/EventDetails', function () {
    return view('EventDetails');
});

