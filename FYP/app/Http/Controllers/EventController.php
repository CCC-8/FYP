<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\User;
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
                    'floor_plan' => json_encode([
                        'floor_plan_image' => $venue->default_floor_plan,
                        'canvas_modifications' => null
                    ]),
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
            'venue' => 'nullable|array'
        ]);

        $event->update($validatedData);

        if ($request->has('venue')) {
            $selectedVenues = $request->input('venue');
            $event->venue = implode(',', $selectedVenues);
            $event->save();
            $eventVenues = EventVenue::where('event_id', $eventId)->get();

            foreach ($eventVenues as $eventVenue) {
                $venue = Venue::find($eventVenue->venue_id);
                if ($venue && in_array($venue->name, $selectedVenues)) {
                    $eventVenue->floor_plan = json_encode([
                        'floor_plan_image' => $venue->default_floor_plan,
                        'canvas_modifications' => null
                    ]);
                    $eventVenue->update($eventVenue->floor_plan);
                }
            }
        }

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

    public function deleteEvent($eventId)
    {
        // Handle event deletion logic
    }

    // ---------------------------- User ---------------------------- 

    public static function user_index()
    {
        $events = Event::all();
        return view('User/Events', compact('events'));
    }

    public static function show_events()
    {
        $events = Event::all();
        return view('User/UserIndex', compact('events'));
    }

    public function event_details(Request $request, $id)
    {
        $event = Event::find($id);
        return view('User/EventDetails', compact('id', 'event'));
    }

    public function crewApplication($userId, $eventId)
    {
        $user = User::find($userId);
        $event = Event::find($eventId);

        $existingApplication = Crew::where('user_id', $userId)->where('event_id', $eventId)->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied as crew for this event.');
        }

        $crew = new Crew([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'status' => 'Pending'
        ]);

        $crew->save();

        return redirect()->back()->with('success', 'Applied as crew successfully.');
    }
}
