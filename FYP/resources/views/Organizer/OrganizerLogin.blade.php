@extends('Organizer/_RLForm')
@section('body')
    <div class="rlForm">
        <div class="box" style="height: 400px !important">
            <span class="borderLine"></span>
            <form method="POST" action="/OrganizerLogin">
                @csrf
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" name="name" required="required">
                    <span>Organization Name</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="/OrganizerRegister">Sign Up</a>
                </div>
                <br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
@endsection
