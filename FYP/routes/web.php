<?php

use App\Http\Controllers\CrewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventVenueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\DealerController;
use Illuminate\Support\Facades\Route;

// ------------------------------- Organizer Routes -------------------------------

Route::get('/OrganizerIndex', function () {
    return view('Organizer/OrganizerIndex');
});
Route::get('/ProfileManagement', function () {
    return view('Organizer/ProfileManagement');
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
    return DealerController::showDealers();
});

Route::get('/VenueManagement', function () {
    return view('Organizer/VenueManagement');
});

Route::post('/CreateNewVenue', [VenueController::class, 'store']);

Route::get('/CrewManagement/{eventId}', [CrewController::class, 'crewManagement']);
Route::post('/approveApplication/{crewId}', [CrewController::class, 'approveApplication']);
Route::post('/rejectApplication/{crewId}', [CrewController::class, 'rejectApplication']);

Route::get('/Calendar', [EventController::class, 'calendar_events']);

// Route::get('/FloorPlan/{venueId}/edit', [EventVenueController::class, 'editFloorPlan']);
// Route::post('/FloorPlan/{venueId}/save', [EventVenueController::class, 'saveCanvas']);
Route::get('/FloorPlan2/{eventId}', [EventVenueController::class, 'showFloorPlan']);

Route::get('/FloorPlan2', function () {
    return view('Organizer/FloorPlan2');
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

Route::post('/EditDealerProfile', [UserController::class, 'editDealerProfile']);

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

Route::get('/CrewApplication/{userId}/{eventId}', [EventController::class, 'crewApplication']);

Route::get('/UserLogin', function () {
    return view('User/UserLogin');
});
Route::post('/UserLogin', [UserController::class, 'userLogin']);
Route::get('/UserLogout', [UserController::class, 'userLogout']);

Route::get('/UserRegister', function () {
    return view('User/UserRegister');
});
Route::post('/UserRegister', [UserController::class, 'userRegister']);

Route::get('/ResetPassword', function () {
    return view('User/ResetPassword');
});
Route::post('/ResetPassword', [UserController::class, 'resetPassword']);
