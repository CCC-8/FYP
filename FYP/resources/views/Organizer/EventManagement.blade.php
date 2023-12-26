@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Event Management</h1>
        <a href="/CreateEvent"><button class="btn btn-primary">+ New Event</button></a>
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
                        <td>
                            @if ($event->startDate === $event->endDate)
                                {{ $event->startDate }}
                            @else
                                {{ $event->startDate }} - {{ $event->endDate }}
                            @endif
                        </td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>{{ $event->type }}</td>
                        <td class="text-center">
                            <a href="/EditEventDetails/{{ $event->id }}">
                                <button type="submit" class="btn btn-warning">
                                    <img width="25" height="25" src="https://img.icons8.com/windows/32/edit.png" />
                                </button>
                            </a>
                            <a href="/FloorPlan/{{ $event->id }}">
                                <button type="submit" class="btn btn-info">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/windows/24/floor-plan.png" />
                                </button>
                            </a>
                            <a href="/CrewManagement/{{ $event->id }}">
                                <button type="submit" class="btn btn-primary">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/windows/32/standing-man.png" />
                                </button>
                            </a>
                            <a href="/DeleteEvent/{{ $event->id }}"
                                onclick="confirmDelete(event, {{ $event->id }})">
                                <button type="submit" class="btn btn-danger">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/fluency-systems-regular/48/delete-forever.png" />
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(event, eventId) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this event?')) {
                window.location.href = `/DeleteEvent/${eventId}`;
            } else {
                return false;
            }
        }
    </script>
@endsection
