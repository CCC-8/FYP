@extends('Organizer/_ORGANIZER')
@section('body')
    <div id="calendar" style="width: 95%; padding: 3% 0 0 10%"></div>

    {{-- Calendar API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: new Date(),
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
            });
            calendar.render();
        });
    </script>
@endsection
