@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Create New Event</h1>
        <hr>
        <form method="POST" action="/CreateNewEvent" style="width: 60%">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" name="startDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="text" name="startTime" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endTime">End Time:</label>
                <input type="text" name="endTime" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" name="venue" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Event Type:</label>
                <select name="type" class="form-control">
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Create Event</button>
        </form>
    </div>
@endsection
