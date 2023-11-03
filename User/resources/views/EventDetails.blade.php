@extends('_USER')
@section('body')
    <main id="main">

        <!-- ======= Event Details Section ======= -->
        <section id="event-details" class="event-details" style="padding-top: 10%">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <img src="assets/img/hero-bg.jpg" style="width: 90%; object-fit: cover" />
                    </div>

                    <div class="col-lg-4">
                        <div class="event-info">
                            <h3>Event Information</h3>
                            <ul>
                                <li><strong>Category</strong>: Public</li>
                                <li><strong>Client</strong>: ASU Company</li>
                                <li><strong>Project date</strong>: 01 March, 2020</li>
                                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Event Details Section -->

    </main><!-- End #main -->
@endsection
