@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Crew Management</h1>
        <hr>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Crew Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crewMembers as $crew)
                    <tr>
                        <td>{{ $crew['name'] }}</td>
                        <td>{{ $crew['email'] }}</td>
                        <td>{{ $crew['contactNo'] }}</td>
                        <td>{{ $crew['status'] }}</td>
                        <td>
                            @if (strtolower($crew['status']) == 'pending')
                                <form action="/approveApplication/{{ $crew['user_id'] }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="/rejectApplication/{{ $crew['user_id'] }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @else
                                Status: {{ $crew['status'] }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
