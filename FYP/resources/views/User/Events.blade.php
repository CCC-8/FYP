@extends('User/_USER')
@section('body')
    <main id="main">
        <!-- ======= Event Section ======= -->
        <section id="event-details" class="event-details" style="padding-top: 10%">
            <div class="container">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="event-img">
                                    <a href="EventDetails/{{ $event->id }}">
                                        <img class="card-img-top" src="/images/{{ $event->eventImage }}"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">{{ $event->startDate }} @ {{ $event->venue }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
