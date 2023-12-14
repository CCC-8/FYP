@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Create New Event</h1>
        <hr>
        <form method="POST" action="/CreateNewEvent" style="width: 60%" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <img id="previewImage" class="avatar img-circle img-thumbnail mt-3"
                    style="object-fit: cover; width: 270px; height: 270px; transform: translate3d(0, 0, 1px);">
                <h6 class="pt-3">Upload a photo...</h6>
                <input type="file" id="eventImageInput" name="eventImage" class="form-control" required>
                @if ($errors->has('eventImage'))
                    <div class="text-danger">{{ $errors->first('eventImage') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" name="startDate" class="form-control" required>
                @if ($errors->has('startDate'))
                    <div class="text-danger">{{ $errors->first('startDate') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="text" name="startTime" class="form-control" required>
                @if ($errors->has('startTime'))
                    <div class="text-danger">{{ $errors->first('startTime') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" class="form-control" required>
                @if ($errors->has('endDate'))
                    <div class="text-danger">{{ $errors->first('endDate') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="endTime">End Time:</label>
                <input type="text" name="endTime" class="form-control" required>
                @if ($errors->has('endTime'))
                    <div class="text-danger">{{ $errors->first('endTime') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" class="form-control" required>
                @if ($errors->has('status'))
                    <div class="text-danger">{{ $errors->first('status') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <div class="venue-selection">
                    <label class="radio-label">
                        <input type="radio" name="venue" value="South Paddock">&nbsp;&nbsp;South Paddock
                        <img src="/OrganizerAssets/img/venues/south-paddock.jpg" alt="South Paddock" class="hover-image">
                    </label><br>
                    <label class="radio-label">
                        <input type="radio" name="venue" value="Paddock Chalet">&nbsp;&nbsp;Paddock Chalet
                        <img src="/OrganizerAssets/img/venues/paddock-chalet.jpg" alt="Paddock Chalet" class="hover-image">
                    </label><br>
                    <label class="radio-label">
                        <input type="radio" name="venue" value="North Paddock">&nbsp;&nbsp;North Paddock
                        <img src="/OrganizerAssets/img/venues/north-paddock.jpg" alt="North Paddock" class="hover-image">
                    </label><br>
                    <label class="radio-label">
                        <input type="radio" name="venue" value="Paddock Club">&nbsp;&nbsp;Paddock Club
                        <img src="/OrganizerAssets/img/venues/paddock-club.jpeg" alt="Paddock Club" class="hover-image">
                    </label><br>
                    <label class="radio-label">
                        <input type="radio" name="venue" value="Perdana Suite">&nbsp;&nbsp;Perdana Suite
                        <img src="/OrganizerAssets/img/venues/perdana-suite.jpeg" alt="Perdana Suite" class="hover-image">
                    </label>
                </div>
                @if ($errors->has('venue'))
                    <div class="text-danger">{{ $errors->first('venue') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="type">Event Type:</label>
                <select name="type" class="form-control">
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
                @if ($errors->has('type'))
                    <div class="text-danger">{{ $errors->first('type') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Create Event</button>
        </form>
    </div>

    <script>
        document.getElementById('eventImageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
