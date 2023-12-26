@extends('User/_USER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>Speedy</span></h1>
                    <h2>Ignite your passion for car racing and embark on an exciting journey!</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                        <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Events Section ======= -->
        <section id="chefs" class="chefs">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Events</h2>
                    <p>Our Upcoming Events</p>
                </div>

                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-4 col-md-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <img src="/images/{{ $event->eventImage }}" class="img-fluid" alt=""
                                    style="height: 300px; object-fit: cover;">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h3>{{ $event->name }}</h3>
                                        <span>{{ $event->startDate }} @ {{ $event->venue }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-4 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="text-center">
                                    <a href="/Events"><button class="btn">View All Events</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Chefs Section -->

    </main><!-- End #main -->

@endsection
