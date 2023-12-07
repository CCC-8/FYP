@extends('User/_USER')
@section('body')
    <main id="main">
        <section id="book-a-table" class="book-a-table" style="padding-top: 10%">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Crew Application</h2>
                    <p>Event name here</p>
                </div>

                <form action="" method="post" role="form">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contactNo" id="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <label>Event Date</label>
                            <input type="text" name="startDate" class="form-control" id="date">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <input type="text" class="form-control" name="time" id="time" placeholder="Time"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                    </div>
                    <div class="text-center"><button class="btn btn-warning mt-4"
                            type="submit"><strong>Apply</strong></button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
