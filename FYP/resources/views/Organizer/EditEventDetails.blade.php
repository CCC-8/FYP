@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Edit Event Details</h1>
        <hr>
        <form method="POST" action="/EditEventDetails/{{ $eventId }}" style="width: 60%">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $event->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" name="startDate" class="form-control" value="{{ $event->startDate }}" required>
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="text" name="startTime" class="form-control" value="{{ $event->startTime }}" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" class="form-control" value="{{ $event->endDate }}" required>
            </div>
            <div class="form-group">
                <label for="endTime">End Time:</label>
                <input type="text" name="endTime" class="form-control" value="{{ $event->endTime }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" class="form-control" value="{{ $event->status }}" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" name="venue" class="form-control" value="{{ $event->venue }}" required>
            </div>
            <div class="form-group">
                <label for="type">Event Type:</label>
                <select name="type" class="form-control">
                    <option value="Public" {{ $event->type === 'Public' ? 'selected' : '' }}>Public</option>
                    <option value="Private" {{ $event->type === 'Private' ? 'selected' : '' }}>Private</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3 mb-5">Save</button>
            <button type="button" class="btn btn-danger mt-3 mb-5">Discard</button>
        </form>
    </div>
@endsection
