<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crew;

class CrewController extends Controller
{
    public function approveApplication(Request $request, $crewId)
    {
        // Handle crew application approval logic
    }

    public function rejectApplication(Request $request, $crewId)
    {
        // Handle crew application rejection logic
    }
}
