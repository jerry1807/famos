    <h1>Google Calendar Events</h1>
    <ul>
        @foreach ($calendarEvents as $event)
            <li>{{ $event->summary }} ({{ $event->start->dateTime }})</li>
        @endforeach
    </ul>
