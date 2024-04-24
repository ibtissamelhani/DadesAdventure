<x-profile.profile :user="Auth::user()">
    <style>
        .fc-event {
            padding: 4px;
            white-space:pre-wrap
        }
       
    </style>
    <h1 class="bg-cornell-red p-4 text-center text-gray-50 font-bold text-2xl rounded-sm">Bookings</h1>
    <div class="h-screen text-cornell-red" id='calendar'></div>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: @json($bookings)
        });
        calendar.render();
      });

    </script>
</x-profile.profile>