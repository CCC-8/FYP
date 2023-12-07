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
                    <tr>
                        <td>{{ $dealer->name }}</td>
                        <td>{{ $dealer->email }}</td>
                        <td>{{ $dealer->contactNo }}</td>
                        <td class="text-center">
                            <a href="#" onclick="openTawkTo('{{ $dealer->id }}', '{{ $dealer->name }}')">
                                <button type="submit" class="btn btn-warning">
                                    <img width="25" height="25"
                                        src="https://img.icons8.com/material-outlined/24/chat.png" />
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openTawkTo(dealerId, dealerName) {
            Tawk_API.maximize();
            Tawk_API.toggle();
            Tawk_API.setAttributes({
                'name': 'Organizer', // Set organizer's name here
                'email': 'organizer@example.com', // Organizer's email
                'group': 'Organizers', // A group name to differentiate organizers from dealers
                'dealer_id': dealerId, // Pass dealer's ID to track conversations
                'dealer_name': dealerName // Pass dealer's name for identification
            }, function(error) {
                // Handle errors if any
                console.log('Tawk.to setAttributes error:', error);
            });
        }
    </script>

    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6566044326949f79113596b0/1hgb81ash';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->
@endsection
