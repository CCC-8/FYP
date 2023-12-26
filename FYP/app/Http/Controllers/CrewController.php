<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Models\User;
use App\Models\Event;

class CrewController extends Controller
{
    // User
    public function crewApplication(Request $request, $userId, $eventId)
    {
        $user = User::find($userId);
        $event = Event::find($eventId);

        // Check if the user has already applied for any events that clash with the current event's date
        $existingApplications = Crew::where('user_id', $userId)
            ->whereHas('event', function ($query) use ($event) {
                $query->where('startDate', '<=', $event->endDate)
                    ->where('endDate', '>=', $event->startDate);
            })
            ->first();

        if ($existingApplications) {
            return redirect()->back()->with('error', 'You have already applied for an event that clashes with this date.');
        }

        $existingApplication = Crew::where('user_id', $userId)->where('event_id', $eventId)->first();

        if ($existingApplication) {
            return redirect('/UserIndex')->with('error', 'You have already applied as crew for this event.');
        }

        $crew = new Crew([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'age' => request('age'),
            'gender' => request('gender'),
            'experience' => request('experience'),
            'status' => 'Pending'
        ]);

        if ($request->hasFile('crewImage')) {
            $image = $request->file('crewImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $crew->crewImage = $imageName;
        } else {
            if ($user->profile_image) {
                $crew->crewImage = $user->profile_image;
            }
        }

        $crew->save();

        return redirect('/UserIndex')->with('success', 'Applied as crew successfully.');
    }

    public function showUserProfile()
    {
        $loggedInUser = session('loggedInUser');
        $crewApplications = Crew::where('user_id', $loggedInUser->id)->with('event')->get();

        return view('User/UserProfile', compact('loggedInUser', 'crewApplications'));
    }

    public function withdrawApplication($applicationId)
    {
        $application = Crew::findOrFail($applicationId);

        $application->delete();

        return redirect()->back()->with('success', 'Application withdrawn successfully.');
    }

    // Organizer
    
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
                'age' => $crew->age,
                'gender' => $crew->gender,
                'experience' => $crew->experience,
                'crewImage' => $crew->crewImage,
                'status' => $crew->status,
            ];
        }

        return view('Organizer/CrewManagement')->with(compact('event', 'crewMembers'));
    }

    public function approveApplication($userId, $eventId)
    {
        $crew = Crew::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if (!$crew) {
            return redirect()->back()->with('error', 'Crew not found.');
        }

        $crew->status = 'Approved';
        $crew->save();

        return redirect()->back()->with('success', 'Crew application approved');
    }

    public function rejectApplication($userId, $eventId)
    {
        $crew = Crew::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if (!$crew) {
            return redirect()->back()->with('error', 'Crew not found.');
        }

        $crew->status = 'Rejected';
        $crew->save();

        return redirect()->back()->with('success', 'Crew application rejected');
    }
}
