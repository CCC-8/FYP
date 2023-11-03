@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Organizer Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <div class="text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail"
                        alt="avatar" style="object-fit: cover; width: 270px; height: 270px">
                    <h6 class="pt-3">Upload a different photo...</h6>
                    <input type="file" class="form-control">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-8 personal-info">
                <h3>Organization info</h3><br>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Company:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" type="text" value=""></textarea>
                        </div>
                    </div><br>
                    <div style="float: left;">
                        <button type="button" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
@endsection
