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
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                            class="avatar img-circle img-thumbnail" alt="avatar"
                            style="object-fit: cover; width: 270px; height: 270px">
                        <h6 class="pt-3">Upload a different photo...</h6>
                        <input type="file" name="profile_image" class="form-control">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-8 personal-info">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Company:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="name" type="text" value="{{ $loggedInUser->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="email" type="text" value="{{ $loggedInUser->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="contactNo" type="text" value="{{ $loggedInUser->contactNo }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="address" type="text" value=""></textarea>
                        </div>
                    </div><br>
                    <div style="float: left;">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger">Discard</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
@endsection
