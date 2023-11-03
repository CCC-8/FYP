<?php

use Illuminate\Support\Facades\Route;

// ------------------------------- Organizer Routes -------------------------------

Route::get('/OrganizerIndex', function () {
    return view('Organizer/OrganizerIndex');
});

Route::get('/AccountManagement', function () {
    return view('Organizer/AccountManagement');
});

Route::get('/EventManagement', function () {
    return view('Organizer/EventManagement');
});

Route::get('/DealershipManagement', function () {
    return view('Organizer/DealershipManagement');
});

Route::get('/VenueManagement', function () {
    return view('Organizer/VenueManagement');
});

Route::get('/CrewManagement', function () {
    return view('Organizer/CrewManagement');
});

Route::get('/Calendar', function () {
    return view('Organizer/Calendar');
});

Route::get('/Login', function () {
    return file_get_contents(base_path('resources/views/Organizer/pages/Login.html'));
});

Route::get('/Register', function () {
    return file_get_contents(base_path('resources/views/Organizer/pages/Register.html'));
});

// ------------------------------- Dealer Routes -------------------------------

Route::get('/DealerIndex', function () {
    return view('Dealer/DealerIndex');
});

// ------------------------------- User Routes -------------------------------

Route::get('/UserIndex', function () {
    return view('User/UserIndex');
});

Route::get('/Events', function () {
    return view('User/Events');
});

Route::get('/EventDetails', function () {
    return view('User/EventDetails');
});

