@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container pt-5">
        <form method="POST" action="/CreateNewVenue" enctype="multipart/form-data">
            @csrf
            <label for="Venue">Venue</label>
            <input type="text" name="name" id="name"><br>
            <label for="Capacity">Capacity</label>
            <input type="text" name="capacity" id="capacity"><br>
            <label for="Default Floor Plan">Default Floor Plan</label>
            <input type="file" name="default_floor_plan" id="default_floor_plan"><br>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection
