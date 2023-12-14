<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventVenueController extends Controller
{
    public function showFloorPlan($eventId)
    {
        $event = Event::find($eventId);

        if (!$event) {
            return redirect('/EventManagement')->with('error', 'Event not found.');
        }

        return view('Organizer/FloorPlan', compact('event'));
    }

    public function updateFloorPlan(Request $request, $eventId)
    {
        if ($request->has('canvasData')) {
            $imageData = $request->input('canvasData');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);

            $imageName = time() . '.png'; // Or use a unique name
            $path = public_path('images') . '/' . $imageName; // Adjust the directory path as needed

            // Save the image file
            file_put_contents($path, base64_decode($imageData));

            $event = Event::findOrFail($eventId);
            // Store the image path or name in the database field
            $event->floorPlan = $imageName;
            $event->save();
        }
    }
}
