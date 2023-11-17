<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// ------------------------------- Organizer Routes -------------------------------

Route::get('/OrganizerIndex', function () {
    return view('Organizer/OrganizerIndex');
});

Route::get('/AccountManagement', function () {
    return view('Organizer/AccountManagement');
});

Route::get('/EventManagement', function () {
    return EventController::org_index();
});

Route::get('/CreateEvent', function () {
    return view('Organizer/CreateEvent');
});

Route::post('/CreateNewEvent', [EventController::class, 'store']);

Route::get('/DealershipManagement', function () {
    return view('Organizer/DealershipManagement');
});

Route::get('/VenueManagement', function () {
    return view('Organizer/VenueManagement');
});

Route::get('/CrewManagement', function () {
    return view('Organizer/CrewManagement');
});

Route::get('/Calendar', [EventController::class, 'calendar_events']);

Route::get('/FloorPlan', function () {
    return view('Organizer/FloorPlan');
});

Route::get('/Login', function () {
    return file_get_contents(base_path('resources/views/Organizer/pages/Login.html'));
});

Route::get('/Register', function () {
    return file_get_contents(base_path('resources/views/Organizer/pages/Register.html'));
});

// Route::post('/OrganizerIndex', 'UserController@organizerRegister')->name('organizer.register');

// ------------------------------- Dealer Routes -------------------------------

Route::get('/DealerIndex', function () {
    return view('Dealer/DealerIndex');
});

// ------------------------------- User Routes -------------------------------

Route::get('/UserIndex', function () {
    return view('User/UserIndex');
});

Route::get('/Events', function () {
    return EventController::user_index();
});

Route::get('/EventDetails/{id}', [EventController::class, 'event_details']);
