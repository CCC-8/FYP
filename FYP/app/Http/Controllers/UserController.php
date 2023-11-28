<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\Crew;
use App\Models\Dealer;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = DB::table('users')
            ->where('name', $name)
            ->where('user_type', 'user')
            ->first();

        if ($user && password_verify($password, $user->password)) {
            session(['loggedIn' => true]);
            session(['loggedInUser' => $user]);
            return redirect('/UserIndex')->with('info', 'Login successful');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function userLogout()
    {
        session(['loggedIn' => false]);

        return redirect('/UserLogin')->with('info', 'Logged out successfully');
    }

    public function dealerLogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = DB::table('users')
            ->where('name', $name)
            ->where('user_type', 'dealer')
            ->first();

        if ($user && password_verify($password, $user->password)) {
            session(['loggedIn' => true]);
            session(['loggedInUser' => $user]);
            return redirect('/DealerIndex')->with('info', 'Login successful');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function dealerLogout()
    {
        session(['loggedIn' => false]);

        return redirect('/DealerLogin')->with('info', 'Logged out successfully');
    }

    public function organizerLogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = DB::table('users')
            ->where('name', $name)
            ->where('user_type', 'organizer')
            ->first();

        if ($user && password_verify($password, $user->password)) {
            session(['loggedInUser' => $user]);
            return redirect('/OrganizerIndex')->with('info', 'Login successful');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'user',
        ]);

        $user->save();
        session(['loggedIn' => true]);
        session(['loggedInUser' => $user]);

        return redirect('/UserIndex')->with('info', 'User registered successfully');
    }

    public function dealerRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $dealer = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'dealer',
        ]);

        $dealer->save();

        session(['loggedIn' => true]);
        session(['loggedInUser' => $dealer]);
        return redirect('/DealerIndex')->with('info', 'User registered successfully');
    }

    public function organizerRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'contactNo' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $organizer = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contactNo' => $request->input('contactNo'),
            'password' => bcrypt($request->input('password')),
            'user_type' => 'organizer',
        ]);

        $organizer->save();
        session(['loggedIn' => true]);
        session(['loggedInUser' => $organizer]);

        return redirect('/OrganizerIndex')->with('info', 'User registered successfully');
    }

    public function editUserProfile(Request $request)
    {
        $loggedInUser = session('loggedInUser');

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $loggedInUser->id,
            'contactNo' => 'required|string|max:15',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($loggedInUser->id);

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

        $updatedUser = User::find($loggedInUser->id);
        session(['loggedInUser' => $updatedUser]);

        return redirect('/UserIndex')->with('success', 'Profile updated successfully.');
    }

    public function editDealerProfile(Request $request)
    {
        $loggedInUser = session('loggedInUser');

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $loggedInUser->id,
            'contactNo' => 'required|string|max:15',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($loggedInUser->id);

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

        $updatedUser = User::find($loggedInUser->id);
        session(['loggedInUser' => $updatedUser]);

        return redirect('/DealerIndex')->with('success', 'Profile updated successfully.');
    }

    public function editOrganizerProfile(Request $request)
    {
        $loggedInUser = session('loggedInUser');

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $loggedInUser->id,
            'contactNo' => 'required|string|max:15',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($loggedInUser->id);

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

        $updatedUser = User::find($loggedInUser->id);
        session(['loggedInUser' => $updatedUser]);

        return redirect('/OrganizerIndex')->with('success', 'Profile updated successfully.');
    }

    public function resetPassword(Request $request)
    {
    }
}
