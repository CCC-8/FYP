@extends('Organizer/_ORGANIZER')
@section('body')
    <div id="calendar" style="width: 95%; padding: 3% 0 0 10%"></div>

    {{-- Calendar API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2023-11-12',
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'prev,next today',
                },
                events: @json($formattedEvents),
                displayEventTime: false,
                eventClick: function(info) {
                    window.location.href = '/EditEventDetails/' + info.event.id;
                },
                // events: [{
                //         title: 'All Day Event',
                //         start: '2023-09-01'
                //     },
                //     {
                //         title: 'Long Event',
                //         start: '2023-09-07',
                //         end: '2023-09-10'
                //     },
                //     {
                //         groupId: '999',
                //         title: 'Repeating Event',
                //         start: '2023-09-09T16:00:00'
                //     },
                //     {
                //         groupId: '999',
                //         title: 'Repeating Event',
                //         start: '2023-09-16T16:00:00'
                //     },
                //     {
                //         title: 'Conference',
                //         start: '2023-09-11',
                //         end: '2023-09-13'
                //     },
                //     {
                //         title: 'Meeting',
                //         start: '2023-09-12T10:30:00',
                //         end: '2023-09-12T12:30:00'
                //     },
                //     {
                //         title: 'Lunch',
                //         start: '2023-09-12T12:00:00'
                //     },
                // ]
            });
            calendar.render();
        });
    </script>
@endsection
