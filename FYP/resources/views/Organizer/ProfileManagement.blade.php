@extends('Organizer/_ORGANIZER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Organizer Profile</h1>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="/EditOrganizerProfile" enctype="multipart/form-data">
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
                        @if ($errors->has('profile_image'))
                            <div class="text-danger">{{ $errors->first('profile_image') }}</div>
                        @endif
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-8 personal-info">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Full Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="name" type="text" value="{{ $loggedInUser->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="email" type="text" value="{{ $loggedInUser->email }}">
                        </div>
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="contactNo" type="text"
                                value="{{ $loggedInUser->contactNo }}">
                        </div>
                        @if ($errors->has('contactNo'))
                            <div class="text-danger">{{ $errors->first('contactNo') }}</div>
                        @endif
                    </div><br>
                    <div style="float: left;">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="cancel" class="btn btn-danger">Discard</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>

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
