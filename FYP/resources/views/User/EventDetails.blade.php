@extends('User/_USER')
@section('body')
    @php
        $loggedInUser = session('loggedInUser');
        $applied = $event
            ->crews()
            ->where('user_id', $loggedInUser->id)
            ->exists();
        $crewApplication = App\Models\Crew::where('event_id', $event->id)
            ->where('user_id', $loggedInUser->id)
            ->first();
    @endphp
    <main id="main">
        <!-- ======= Event Details Section ======= -->
        <section id="event-details" class="event-details" style="padding-top: 10%">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <img src="/images/{{ $event->eventImage }}"
                            style="width: 450px; height: 450px; object-fit: cover; margin-left: 25%; border: 8px #cda45e solid" />
                    </div>

                    <div class="col-lg-5">
                        <div class="event-info" style="margin-top: 4%; padding: 10%;">
                            <h3>{{ $event->name }}</h3>
                            <ul>
                                <li><strong>Description</strong>: {{ $event->description }}</li>
                                <li><strong>Venue</strong>: {{ $event->venue }}</li>
                                <li><strong>Date</strong>:
                                    @if ($event->startDate === $event->endDate)
                                        {{ $event->startDate }}
                                    @else
                                        {{ $event->startDate }} - {{ $event->endDate }}
                                    @endif
                                </li>
                                <li><strong>Time</strong>: {{ $event->startTime }}</li>
                                <li><strong>Type</strong>: {{ $event->type }}</li>
                            </ul>
                            @if ($crewApplication)
                                @if ($crewApplication->status === 'Approved')
                                    <button class="btn btn-success mt-3" disabled>Approved</button>
                                @elseif($crewApplication->status === 'Rejected')
                                    <button class="btn btn-danger mt-3" disabled>Rejected</button>
                                @else
                                    <button class="btn btn-secondary mt-3" disabled>Pending for Approval</button>
                                @endif
                            @elseif(strtotime($event->startDate) <= strtotime('today'))
                                <button class="btn btn-dark mt-3" disabled>Event Expired</button>
                            @else
                                <a href="/CrewApplication/{{ $event->id }}">
                                    <button class="btn btn-warning mt-3">Join As Crew</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Event Details Section -->
    </main>
@endsection
