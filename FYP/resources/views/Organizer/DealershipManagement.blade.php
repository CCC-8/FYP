@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Dealership Management</h1>
        <hr>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Dealer</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact Number</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dealers as $dealer)
                    <tr class="text-center">
                        <td><div class="dealer-info">
                            <span class="crew-name">{{ $dealer->name }}</span>&nbsp;
                            <div class="icon-container">
                                <span class="icon"
                                    style="background-image: url('/images/{{ $dealer->profile_image }}')"></span>
                                <div class="tooltip">
                                    <img src="/images/{{ $dealer->profile_image }}"
                                        style="width: 150px; height: 150px; object-fit: contain" alt="Crew Image">
                                </div>
                            </div>
                        </div></td>
                        <td>{{ $dealer->email }}</td>
                        <td>{{ $dealer->contactNo }}</td>
                        <td class="text-center">
                            <a href="/ProductManagement/{{ $dealer->id }}">
                                <button type="submit" class="btn btn-warning">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/windows/32/package--v1.png" alt="package--v1" />
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
