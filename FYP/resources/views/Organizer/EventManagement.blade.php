@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Event Management</h1>
        <a href="/CreateEvent">Create New Event</a>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Venue</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->startDate }} - {{ $event->endDate }}</td>
                    <td>{{ $event->status }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->type }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
