<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventVenueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
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

Route::get('/EditEventDetails/{eventId}', [EventController::class, 'editEventDetails']);

Route::post('/EditEventDetails/{eventId}', [EventController::class, 'updateEventDetails']);

Route::get('/DealershipManagement', function () {
    return view('Organizer/DealershipManagement');
});

Route::get('/VenueManagement', function () {
    return view('Organizer/VenueManagement');
});

Route::post('/CreateNewVenue', [VenueController::class, 'store']);

Route::get('/CrewManagement', function () {
    return view('Organizer/CrewManagement');
});

Route::get('/Calendar', [EventController::class, 'calendar_events']);

Route::get('/FloorPlan/{eventId}/edit', [EventVenueController::class, 'editFloorPlan']);

Route::post('/UpdateFloorPlan/{eventId}/{venueId}', [EventVenueController::class, 'updateFloorPlan']);

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

Route::get('/DealerLogin', function () {
    return view('Dealer/DealerLogin');
});

Route::post('/DealerLogin', [UserController::class, 'dealerLogin']);

Route::get('/DealerLogout', [UserController::class, 'dealerLogout']);

Route::get('/DealerRegister', function () {
    return view('Dealer/DealerRegister');
});

Route::post('/DealerRegister', [UserController::class, 'dealerRegister']);

// ------------------------------- User Routes -------------------------------

Route::get('/UserIndex', function () {
    return view('User/UserIndex');
});

Route::get('/UserIndex', [EventController::class, 'show_events']);

Route::get('/UserProfile', function () {
    return view('User/UserProfile');
});

Route::post('/EditUserProfile', [UserController::class, 'editUserProfile']);

Route::get('/Events', function () {
    return EventController::user_index();
});

Route::get('/EventDetails/{id}', [EventController::class, 'event_details']);

Route::get('/UserLogin', function () {
    return view('User/UserLogin');
});

Route::post('/UserLogin', [UserController::class, 'userLogin']);

Route::get('/UserLogout', [UserController::class, 'userLogout']);

Route::get('/UserRegister', function () {
    return view('User/UserRegister');
});

Route::post('/UserRegister', [UserController::class, 'userRegister']);