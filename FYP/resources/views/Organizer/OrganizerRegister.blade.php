@extends('Organizer/_RLForm')
@section('body')
    <div class="rlForm">
        <div class="box">
            <span class="borderLine"></span>
            <form method="POST" action="/OrganizerRegister" style="padding-left: 10%">
                <h2>Sign Up</h2>
                @csrf
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <span>Organization Name</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required>
                    <span>Organization Email</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="contactNo" required>
                    <span>Contact Number</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="confirm_password" required>
                    <span>Confirm Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="/OrganizerLogin">Already have an account? Sign in here</a>
                </div>
                <br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </div>
@endsection
