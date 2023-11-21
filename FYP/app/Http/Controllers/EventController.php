<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Models\EventVenue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    // ---------------------------- Organizer ---------------------------- 
    public static function org_index()
    {
        $events = Event::all();
        return view('Organizer/EventManagement', compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'startTime' => 'required|string',
            'endDate' => 'required|date',
            'endTime' => 'required|string',
            'status' => 'required|string',
            'venue' => 'required|array',
            'venue.*' => 'in:South Paddock,Paddock Chalet,North Paddock,Paddock Club,Perdana Suite',
            'type' => 'required|in:Public,Private',
        ]);

        $event = new Event([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'startDate' => $request->input('startDate'),
            'startTime' => $request->input('startTime'),
            'endDate' => $request->input('endDate'),
            'endTime' => $request->input('endTime'),
            'status' => $request->input('status'),
            'venue' => implode(',', $request->input('venue')),
            'type' => $request->input('type'),
        ]);

        $event->save();

        $selectedVenues = $request->input('venue');
        foreach ($selectedVenues as $venueName) {
            $venue = Venue::where('name', $venueName)->first();
            if ($venue) {
                $eventVenue = new EventVenue([
                    'event_id' => $event->id,
                    'venue_id' => $venue->id,
                    'floor_plan' => $venue->default_floor_plan,
                ]);
                $eventVenue->save();
            }
        }

        return redirect('/EventManagement')->with('success', 'Event created successfully.');
    }

    public function editEventDetails($eventId)
    {
        $event = Event::find($eventId);
        $selectedVenues = explode(',', $event->venue);

        return view('Organizer/EditEventDetails', compact('eventId', 'event', 'selectedVenues'));
    }

    public function updateEventDetails(Request $request, $eventId)
    {
        $event = Event::find($eventId);

        if (!$event) {
            return redirect('/EventManagement')->with('error', 'Event not found.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'startTime' => 'required|string',
            'endDate' => 'required|date',
            'endTime' => 'required|string',
            'status' => 'required|string',
            'type' => 'required|string|in:Public,Private',
        ]);

        if ($request->has('venue')) {
            $selectedVenues = $request->input('venue');
            $event->venue = implode(',', $selectedVenues);
        }

        $event->update($validatedData);

        return redirect('/EventManagement')->with('success', 'Event details updated successfully.');
    }


    public static function calendar_events()
    {
        $events = Event::all();

        $formattedEvents = [];

        foreach ($events as $event) {
            $formattedEvents[] = [
                'id' => $event->id,
                'title' => $event->name . " @ " . $event->venue,
                'start' => Carbon::parse($event->startDate . ' ' . $event->startTime, 'Asia/Kuala_Lumpur')->toIso8601String(),
                'end' => Carbon::parse($event->endDate . ' ' . $event->endTime, 'Asia/Kuala_Lumpur')->toIso8601String(),
            ];
        }

        // dd($formattedEvents);
        return view('Organizer/Calendar', compact('formattedEvents'));
    }

    // ---------------------------- User ---------------------------- 

    public static function user_index()
    {
        $events = Event::all();
        return view('User/Events', compact('events'));
    }

    public function event_details(Request $request, $id)
    {
        $event = Event::find($id);
        return view('User/EventDetails', compact('id', 'event'));
    }



    public function searchEvent(Request $request)
    {
        // Handle event search logic
    }

    public function updateEvent(Request $request, $eventId)
    {
        // Handle event update logic
    }

    public function deleteEvent($eventId)
    {
        // Handle event deletion logic
    }
}
