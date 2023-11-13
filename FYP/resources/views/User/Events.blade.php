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
                                        <img class="card-img-top" src="assets/img/testimg1.jpg"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">{{ $event->date }} @ {{ $event->venue }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="event-img">
                                <a href="/EventDetails">
                                    <img class="card-img-top" src="assets/img/testimg2.jpg"></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="event-img">
                                <a href="/EventDetails">
                                    <img class="card-img-top" src="assets/img/testimg3.jpg"></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
