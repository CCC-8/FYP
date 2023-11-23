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
                    <th class="text-center">Event</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Venue</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->startDate }} - {{ $event->endDate }}</td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>{{ $event->type }}</td>
                        <td class="text-center">
                            <a href="/EditEventDetails/{{ $event->id }}">
                                <button type="submit" class="btn btn-warning">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/windows/32/create-new.png" />
                                </button>
                            </a>
                            <a href="/FloorPlan/{{ $event->id }}/edit">
                                <button type="submit" class="btn btn-info">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/material-outlined/24/floor-plan.png" />
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
