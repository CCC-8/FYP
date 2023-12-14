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
            'floorPlan' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $venue = new Venue([
            'name' => $validatedData['name'],
            'capacity' => $validatedData['capacity'],
        ]);

        if ($request->hasFile('floorPlan')) {
            $image = $request->file('floorPlan');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $venue->floorPlan = $imageName;
        }

        $venue->save();

        return redirect('/VenueManagement')->with('success', 'Venue created successfully.');
    }
}
