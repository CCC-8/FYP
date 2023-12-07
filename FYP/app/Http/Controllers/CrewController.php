<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Models\User;
use App\Models\Event;

class CrewController extends Controller
{
    public function crewManagement($eventId)
    {
        $event = Event::find($eventId);
        $crews = Crew::where('event_id', $eventId)->get();

        $crewMembers = [];
        foreach ($crews as $crew) {
            $user = User::find($crew->user_id);
            $crewMembers[] = [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'contactNo' => $user->contactNo,
                'status' => $crew->status,
            ];
        }

        return view('Organizer/CrewManagement')->with(compact('event', 'crewMembers'));
    }

    public function approveApplication($userId)
    {
        $crew = Crew::where('user_id', $userId)->first();

        if (!$crew) {
            return redirect()->back()->with('error', 'Crew not found.');
        }

        $crew->status = 'Approved';
        $crew->save();

        return redirect()->back()->with('success', 'Crew application approved');
    }

    public function rejectApplication($userId)
    {
        $crew = Crew::where('user_id', $userId)->first();

        if (!$crew) {
            return redirect()->back()->with('error', 'Crew not found.');
        }

        $crew->status = 'Rejected';
        $crew->save();

        return redirect()->back()->with('success', 'Crew application rejected');
    }
}
