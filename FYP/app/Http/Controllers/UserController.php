<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Crew;
use App\Dealer;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'user'])) {
            return redirect()->route('/UserIndex');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function dealerLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'dealer'])) {
            return redirect()->route('/DealerIndex');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function organizerLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'organizer'])) {
            return redirect()->route('/OrganizerIndex');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'user',
        ]);

        $user->save();

        return redirect('/UserIndex');
    }

    public function dealerRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dealer = new Dealer([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'dealer',
        ]);

        $dealer->save();

        return redirect('/DealerIndex');
    }

    public function organizerRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $organizer = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'organizer',
        ]);

        $organizer->save();

        return redirect('/OrganizerIndex')->with('info', 'User registered successfully');
    }

    public function resetPassword(Request $request)
    {
    }

    public function manageUserProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'contactNo' => 'required|string|max:15|unique:users,contactNo,' . $user->id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(auth()->id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contactNo = $request->input('contactNo');

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function manageDealerProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:dealers,email,' . auth()->user()->dealer->id,
            'contactNo' => 'required|string|max:15',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dealer = auth()->user()->dealer;
        $dealer->name = $request->input('name');
        $dealer->email = $request->input('email');
        $dealer->contactNo = $request->input('contactNo');

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $dealer->profile_image = $imageName;
        }

        $dealer->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function manageOrganizerProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'contactNo' => 'required|string|max:15',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(auth()->id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contactNo = $request->input('contactNo');

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
