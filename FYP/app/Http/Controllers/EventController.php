<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    private $venueToFloorPlan = [
        'South Paddock' => 'south-paddock-floorplan.png',
        'Paddock Chalet' => 'paddock-chalet-floorplan.png',
        'North Paddock' => 'north-paddock-floorplan.png',
        'Paddock Club' => 'blank_canvas.png',
        'Perdana Suite' => 'blank_canvas.png',
    ];

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
            'startDate' => 'required|date|after_or_equal:today',
            'startTime' => 'required|regex:/^\d{2}:\d{2}$/',
            'endDate' => 'required|date|after_or_equal:startDate',
            'endTime' => 'required|regex:/^\d{2}:\d{2}$/',
            'status' => 'required|string',
            'venue' => 'required|string|in:South Paddock,Paddock Chalet,North Paddock,Paddock Club,Perdana Suite',
            'type' => 'required|in:Public,Private',
            'eventImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'startTime.regex' => 'The start time must be in 00:00 format.',
            'endTime.regex' => 'The end time must be in 00:00 format.',
            'venue.in' => 'Please select a valid venue.',
            'startDate.after_or_equal' => 'Start date must not be before today.',
            'endDate.after_or_equal' => 'End date must not be before the start date.',
        ]);

        // Validate venue availability
        $venue = $request->input('venue');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $isVenueAvailable = $this->checkVenueAvailability($venue, $startDate, $endDate);

        if (!$isVenueAvailable) {
            return redirect('/EventManagement')->with('error', 'Venue is already occupied for the specified date range.');
        }

        $event = new Event([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'startDate' => $request->input('startDate'),
            'startTime' => $request->input('startTime'),
            'endDate' => $request->input('endDate'),
            'endTime' => $request->input('endTime'),
            'status' => $request->input('status'),
            'venue' => $request->input('venue'),
            'type' => $request->input('type'),
        ]);

        if ($request->hasFile('eventImage')) {
            $image = $request->file('eventImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $event->eventImage = $imageName;
        }

        $selectedVenue = $request->input('venue');
        if (array_key_exists($selectedVenue, $this->venueToFloorPlan)) {
            $event->floorPlan = $this->venueToFloorPlan[$selectedVenue];
        }

        $event->save();

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
            'startDate' => 'required|date|after_or_equal:today',
            'startTime' => 'required|regex:/^\d{2}:\d{2}$/',
            'endDate' => 'required|date|after_or_equal:startDate',
            'endTime' => 'required|regex:/^\d{2}:\d{2}$/',
            'status' => 'required|string',
            'type' => 'required|string|in:Public,Private',
            'venue' => 'required|string|in:South Paddock,Paddock Chalet,North Paddock,Paddock Club,Perdana Suite',
            'eventImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'startTime.regex' => 'The start time must be in 00:00 format.',
            'endTime.regex' => 'The end time must be in 00:00 format.',
            'eventImage.in' => 'Please select a valid image.',
            'startDate.after_or_equal' => 'Start date must not be before today.',
            'endDate.after_or_equal' => 'End date must not be before the start date.',
        ]);

        if ($request->hasFile('eventImage')) {
            $image = $request->file('eventImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            if ($event->eventImage) {
                $previousImagePath = public_path('images') . '/' . $event->eventImage;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $validatedData['eventImage'] = $imageName;
        }

        if (isset($validatedData['venue'])) {
            $selectedVenue = $validatedData['venue'];
            $startDate = $validatedData['startDate'];
            $endDate = $validatedData['endDate'];

            $isVenueAvailable = $this->checkVenueAvailability($selectedVenue, $startDate, $endDate, $eventId);

            if (!$isVenueAvailable) {
                return redirect('/EditEventDetails/' . $eventId)->with('error', 'Venue is already occupied for the specified date range.');
            }

            $venueToFloorPlan = [
                'South Paddock' => 'south-paddock-floorplan.png',
                'Paddock Chalet' => 'paddock-chalet-floorplan.png',
                'North Paddock' => 'north-paddock-floorplan.png',
                'Paddock Club' => 'blank_canvas.png',
                'Perdana Suite' => 'blank_canvas.png',
            ];

            if (array_key_exists($selectedVenue, $venueToFloorPlan)) {
                $event->floorPlan = $venueToFloorPlan[$selectedVenue];
            }

            $event->venue = $selectedVenue;
        }

        $event->update($validatedData);

        return redirect('/EventManagement')->with('success', 'Event details updated successfully.');
    }

    private function checkVenueAvailability($venue, $startDate, $endDate, $eventId = null)
    {
        $existingEvents = Event::where('venue', $venue)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->where('startDate', '<=', $startDate)
                        ->where('endDate', '>=', $startDate);
                })->orWhere(function ($q) use ($startDate, $endDate) {
                    $q->where('startDate', '<=', $endDate)
                        ->where('endDate', '>=', $endDate);
                });
            });

        if ($eventId) {
            $existingEvents->where('id', '!=', $eventId);
        }

        return !$existingEvents->exists();
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
        $event = Event::find($eventId);

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully.');
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

    public function displayCrewApplicationForm(Request $request, $id)
    {
        $event = Event::find($id);
        return view('User/CrewApplication', compact('id', 'event'));
    }
}
