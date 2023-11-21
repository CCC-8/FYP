<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function manageFloorPlan(Request $request)
    {
        // Handle floor plan management logic
    }

    public function showFloorPlan($venueId)
    {
        $venue = Venue::findOrFail($venueId);
        return view('Organizer/FloorPlan', compact('venue'));
    }
}
