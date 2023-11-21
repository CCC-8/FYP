<?php

namespace App\Http\Controllers;

use App\Models\EventVenue;
use Illuminate\Http\Request;

class EventVenueController extends Controller
{
    public function editFloorPlan($eventId, $venueId)
    {
        $eventVenue = EventVenue::where('event_id', $eventId)
            ->where('venue_id', $venueId)
            ->firstOrFail();

        return view('Organizer/FloorPlan', compact('eventVenue'));
    }

    public function updateFloorPlan(Request $request, $eventId, $venueId)
    {
        $eventVenue = EventVenue::where('event_id', $eventId)
            ->where('venue_id', $venueId)
            ->firstOrFail();

        $canvasModifications = $request->input('canvasModifications');

        $floorPlanImage = $request->file('floorPlanImage');

        $floorPlanImagePath = null;
        if ($floorPlanImage) {
            $floorPlanImagePath = $floorPlanImage->store('floor_plans');
        }

        $eventVenue->update([
            'floor_plan' => json_encode([
                'canvas_modifications' => $canvasModifications,
                'floor_plan_image' => $floorPlanImagePath,
            ]),
        ]);

        return redirect()->back()->with('success', 'Floor plan updated successfully');
    }
}
