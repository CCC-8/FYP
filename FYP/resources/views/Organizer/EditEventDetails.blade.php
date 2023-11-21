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
                <div class="venue-selection">
                    <label class="checkbox-label">
                        <input type="checkbox" name="venue[]" value="South Paddock" {{ in_array('South Paddock', $selectedVenues) ? 'checked' : '' }}>&nbsp;&nbsp;South Paddock
                        <img src="/OrganizerAssets/img/venues/south-paddock.jpg" alt="South Paddock" class="hover-image">
                    </label><br>
                    <label class="checkbox-label">
                        <input type="checkbox" name="venue[]" value="Paddock Chalet"{{ in_array('Paddock Chalet', $selectedVenues) ? 'checked' : '' }}>&nbsp;&nbsp;Paddock Chalet
                        <img src="/OrganizerAssets/img/venues/paddock-chalet.jpg" alt="Paddock Chalet" class="hover-image">
                    </label><br>
                    <label class="checkbox-label">
                        <input type="checkbox" name="venue[]" value="North Paddock"{{ in_array('North Paddock', $selectedVenues) ? 'checked' : '' }}>&nbsp;&nbsp;North Paddock
                        <img src="/OrganizerAssets/img/venues/north-paddock.jpg" alt="North Paddock" class="hover-image">
                    </label><br>
                    <label class="checkbox-label">
                        <input type="checkbox" name="venue[]" value="Paddock Club"{{ in_array('Paddock Club', $selectedVenues) ? 'checked' : '' }}>&nbsp;&nbsp;Paddock Club
                        <img src="/OrganizerAssets/img/venues/paddock-club.jpeg" alt="Paddock Club" class="hover-image">
                    </label><br>
                    <label class="checkbox-label">
                        <input type="checkbox" name="venue[]" value="Perdana Suite"{{ in_array('Perdana Suite', $selectedVenues) ? 'checked' : '' }}>&nbsp;&nbsp;Perdana Suite
                        <img src="/OrganizerAssets/img/venues/perdana-suite.jpeg" alt="Perdana Suite" class="hover-image">
                    </label>
                </div>
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
