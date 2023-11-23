<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'default_floor_plan' => 'required|file|mimes:jpeg,png,pdf',
        ]);

        $venue = new Venue([
            'name' => $validatedData['name'],
            'capacity' => $validatedData['capacity'],
            'default_floor_plan' => json_encode([
                'file_path' => $request->file('default_floor_plan')->store('default_floor_plans')
            ]),
        ]);

        $venue->save();

        return redirect('/VenueManagement')->with('success', 'Venue created successfully.');
    }
}
