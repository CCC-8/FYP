@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Crew Management</h1>
        <hr>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Crew</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact Number</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Event Experience</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crewMembers as $crew)
                    <tr class="text-center">
                        <td>
                            <div class="crew-info">
                                <span class="crew-name">{{ $crew['name'] }}</span>&nbsp;
                                <div class="icon-container">
                                    <span class="icon"
                                        style="background-image: url('/images/{{ $crew['crewImage'] }}')"></span>
                                    <div class="tooltip">
                                        <img src="/images/{{ $crew['crewImage'] }}"
                                            style="width: 150px; height: 150px; object-fit: cover" alt="Crew Image">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $crew['email'] }}</td>
                        <td>{{ $crew['contactNo'] }}</td>
                        <td>{{ $crew['age'] }}</td>
                        <td>{{ $crew['gender'] }}</td>
                        <td>{{ $crew['experience'] }}</td>
                        <td>{{ $crew['status'] }}</td>
                        <td style="width: 150px">
                            @if (strtolower($crew['status']) == 'pending')
                                <form action="/approveApplication/{{ $crew['user_id'] }}/{{ $event->id }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><img width="25" height="25"
                                            src="https://img.icons8.com/material-outlined/24/checked-checkbox.png"
                                            alt="checked-checkbox" />
                                    </button>
                                </form>
                                <form action="/rejectApplication/{{ $crew['user_id'] }}/{{ $event->id }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><img width="25" height="25"
                                            src="https://img.icons8.com/material-rounded/24/multiply-2.png"
                                            alt="multiply-2" />
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
