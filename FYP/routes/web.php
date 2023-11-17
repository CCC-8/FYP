<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ------------------------------- Organizer Routes -------------------------------

Route::get('/OrganizerIndex', function () {
    return view('Organizer/OrganizerIndex');
});

Route::get('/AccountManagement', function () {
    return view('Organizer/AccountManagement');
});

Route::post('/EditOrganizerProfile', [UserController::class, 'editOrganizerProfile']);

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

Route::get('/OrganizerLogin', function () {
    return view('Organizer/OrganizerLogin');
});

Route::post('/OrganizerLogin', [UserController::class, 'organizerLogin']);

Route::get('/OrganizerRegister', function () {
    return view('Organizer/OrganizerRegister');
});

Route::post('/OrganizerRegister', [UserController::class, 'organizerRegister']);

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
