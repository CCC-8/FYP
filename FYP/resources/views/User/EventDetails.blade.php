@extends('User/_USER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <main id="main">
        <!-- ======= Event Details Section ======= -->
        <section id="event-details" class="event-details" style="padding-top: 10%">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <img src="/assets/img/testimg1.jpg" style="width: 90%; object-fit: cover" />
                    </div>

                    <div class="col-lg-4">
                        <div class="event-info">
                            <h3>{{ $event->name }}</h3>
                            <ul>
                                <li><strong>Description</strong>: {{ $event->description }}</li>
                                <li><strong>Venue</strong>: {{ $event->venue }}</li>
                                <li><strong>Date</strong>: {{ $event->startDate }} - {{ $event->endDate }}</li>
                                <li><strong>Time</strong>: {{ $event->startTime }}</li>
                                <li><strong>Type</strong>: {{ $event->type }}</li>
                            </ul>
                            <a href="/CrewApplication/{{ $loggedInUser->id }}/{{ $event->id }}">
                                <button
                                    class="mt-4 btn {{ $event->crews()->where('user_id', $loggedInUser->id)->exists()? 'btn-danger disabled': 'btn-warning' }}">
                                    <strong>
                                        {{ $event->crews()->where('user_id', $loggedInUser->id)->exists()? 'Already Applied': 'Join As Crew' }}
                                    </strong>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Event Details Section -->
    </main>
@endsection
