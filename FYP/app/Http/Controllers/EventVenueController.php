<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventVenueController extends Controller
{
    public function showFloorPlan($eventId)
    {
        // Fetch the event details based on the provided event ID
        $event = Event::find($eventId);

        if (!$event) {
            return redirect('/EventManagement')->with('error', 'Event not found.');
        }

        // Here you might retrieve the floor plan related to this event
        // You can pass the floor plan data to the view as needed

        return view('Organizer/FloorPlan2')->with('event', $event);
    }
}
