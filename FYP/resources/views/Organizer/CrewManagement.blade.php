@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Crew Management</h1>
        <hr>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Crew Name</th>
                    <th>Contact Number</th>
                    <th>Age</th>
                    <th>Approval</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Taneesh</td>
                    <td>013-41241411</td>
                    <td>21</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Mirza</td>
                    <td>013-74548556</td>
                    <td>22</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Louis</td>
                    <td>016-52513456</td>
                    <td>29</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
