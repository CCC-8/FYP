@extends('User/_USER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <main id="main">
        <section id="book-a-table" class="book-a-table" style="padding-top: 10%">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Crew Application</h2>
                    <p>{{ $event->name }}</p>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div><br>
                @endif
                <form action="/SubmitApplication/{{ $loggedInUser->id }}/{{ $event->id }}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>Your Personal Details</h3><br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control mt-2" id="name"
                                value="{{ $loggedInUser->name }}">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Email Address</label>
                            <input type="email" class="form-control mt-2" name="email" id="email"
                                value="{{ $loggedInUser->email }}">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Contact Number</label>
                            <input type="text" class="form-control mt-2" name="contactNo" id="contactNo"
                                value="{{ $loggedInUser->contactNo }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control mt-2" id="age" required>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control mt-2">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <label for="experience">Event Experience:</label>
                            <select name="experience" class="form-control mt-2">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <div class="text-center">
                                <img id="previewImage"
                                    src="{{ isset($loggedInUser->profile_image) ? asset('images/' . $loggedInUser->profile_image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                                    class="avatar img-circle img-thumbnail" alt="avatar"
                                    style="object-fit: cover; width: 200px; height: 200px; transform: translate3d(0, 0, 1px);">
                                <input type="file" id="crewImageInput" name="crewImage" class="form-control mt-3">
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-5">Event Details</h3><br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <label>Date</label>
                            <input type="text" name="startDate" class="form-control mt-2" id="startDate"
                                value="{{ $event->startDate }} - {{ $event->endDate }}" disabled>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Location</label>
                            <input type="text" class="form-control mt-2" name="venue" id="venue"
                                value="{{ $event->venue }} @ SIC" disabled>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>Event Type</label>
                            <input type="text" class="form-control mt-2" name="type" id="type"
                                value="{{ $event->type }}" disabled>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-warning mt-4" type="submit" style="border: none"><strong>Apply</strong></button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('crewImageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
