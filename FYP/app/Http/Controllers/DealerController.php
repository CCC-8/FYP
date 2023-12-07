<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DealerController extends Controller
{
    public static function showDealers()
    {
        $dealers = User::where('user_type', 'dealer')->get();
        return view('Organizer/DealershipManagement', compact('dealers'));
    }
}
