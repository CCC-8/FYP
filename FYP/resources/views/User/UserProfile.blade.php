@extends('User/_USER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary" style="margin-top: 8%; color: #cda45e !important">User Profile</h1>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="/EditUserProfile" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <div class="text-center">
                        <img id="previewImage"
                            src="{{ isset($loggedInUser->profile_image) ? asset('images/' . $loggedInUser->profile_image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                            class="avatar img-circle img-thumbnail" alt="avatar"
                            style="object-fit: cover; width: 270px; height: 270px; transform: translate3d(0, 0, 1px);">
                        <h6 class="pt-3">Upload a different photo...</h6>
                        <input type="file" id="profileImageInput" name="profile_image" class="form-control">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-8 personal-info">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="name" type="text" value="{{ $loggedInUser->name }}">
                        </div><br>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="email" type="text" value="{{ $loggedInUser->email }}">
                        </div><br>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="contactNo" type="text"
                                value="{{ $loggedInUser->contactNo }}">
                        </div><br>
                    </div><br>
                    <div style="float: left;">
                        <button type="submit" class="btn btn-success" style="border: none">Update</button>
                        <button type="cancel" class="btn btn-danger" style="border: none">Discard</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <hr><br>

        <h2>Crew Application</h2>
        <table id="dataTable" class="table table-bordered mt-3">
            <thead>
                <tr class="text-center">
                    <th>Event</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crewApplications as $application)
                    <tr class="text-center">
                        <td>{{ $application->event->name }}</td>
                        <td>
                            @if ($application->event->startDate === $application->event->endDate)
                                {{ $application->event->startDate }}
                            @else
                                {{ $application->event->startDate }} - {{ $application->event->endDate }}
                            @endif
                        </td>
                        <td>{{ $application->status }}</td>
                        <td>
                            @if ($application->status !== 'Approved')
                                <a href="/CrewWithdraw/{{ $application->id }}">
                                    <button type="cancel" class="btn btn-danger" style="border: none">Withdraw</button>
                                </a>
                            @else
                                <button class="btn btn-danger" disabled>Withdraw</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        document.getElementById('profileImageInput').addEventListener('change', function(event) {
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
