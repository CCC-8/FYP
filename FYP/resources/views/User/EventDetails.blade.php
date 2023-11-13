@extends('User/_USER')
@section('body')
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
                                <li><strong>Time</strong>: {{ $event->time }}</li>
                                <li><strong>Type</strong>: {{ $event->type }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Event Details Section -->

    </main><!-- End #main -->
@endsection
