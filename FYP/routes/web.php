<?php

use App\Http\Controllers\CrewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventVenueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ProductController;
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
Route::get('/DeleteEvent/{eventId}', [EventController::class, 'deleteEvent']);

Route::get('/DealershipManagement', [DealerController::class, 'showDealers']);
Route::get('/ProductManagement/{dealerId}', [ProductController::class, 'showProducts']);

Route::get('/VenueManagement', function () {
    return view('Organizer/VenueManagement');
});
Route::post('/CreateNewVenue', [VenueController::class, 'store']);

Route::get('/CrewManagement/{eventId}', [CrewController::class, 'crewManagement']);
Route::post('/approveApplication/{crewId}/{eventId}', [CrewController::class, 'approveApplication']);
Route::post('/rejectApplication/{crewId}/{eventId}', [CrewController::class, 'rejectApplication']);

Route::get('/Calendar', [EventController::class, 'calendar_events']);

Route::get('/FloorPlan/{eventId}', [EventVenueController::class, 'showFloorPlan']);
Route::get('/FloorPlan', function () {
    return view('Organizer/FloorPlan');
});
Route::post('/updateFloorPlan/{eventId}', [EventVenueController::class, 'updateFloorPlan']);

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
Route::get('/DealerIndex', [ProductController::class, 'displayProducts']);

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

Route::get('/AddProduct', function () {
    return view('Dealer/AddProduct');
});
Route::post('/AddNewProduct', [ProductController::class, 'addProduct']);
Route::get('/EditProductDetails/{id}', [ProductController::class, 'editProductDetails']);
Route::post('/UpdateProduct/{id}', [ProductController::class, 'updateProduct']);

// ------------------------------- User Routes -------------------------------

Route::get('/UserIndex', function () {
    return view('User/UserIndex');
});
Route::get('/UserIndex', [EventController::class, 'show_events']);

Route::get('/UserProfile', [CrewController::class, 'showUserProfile']);
Route::post('/EditUserProfile', [UserController::class, 'editUserProfile']);

Route::get('/Events', function () {
    return EventController::user_index();
});
Route::get('/EventDetails/{id}', [EventController::class, 'event_details']);

Route::get('/CrewApplication/{id}', [EventController::class, 'displayCrewApplicationForm']);
Route::post('/SubmitApplication/{userId}/{eventId}', [CrewController::class, 'crewApplication']);
Route::get('/CrewWithdraw/{applicationId}', [CrewController::class, 'withdrawApplication']);

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
