<script src="https://apis.google.com/js/api.js"></script>


<h2>Google Calendar Integration<h2>
    
    <!-- "Connect Account" button to open the Google Calendar authentication -->
    <a href="#" id="connectAccountBtn" title="Connect Account" class="btn btn-success btn-block">Connect Google Calendar</a>

    <!-- Bootstrap Modal for Google Calendar integration -->
    <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calendarModalLabel">Google Calendar Integration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Google Calendar integration content will be added here -->
                    <h2>Upcoming Events:</h2>
                    <ul id="event-list"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
        $(document).ready(function () {
            var authWindow = null; // Store a reference to the authentication window

            // Function to check if the Google Calendar account is connected
            function checkGoogleCalendarStatus() {
                // You can use an AJAX request to check the status or authenticate here.
                // You'll need to implement Google Calendar authentication and API calls.
                // Refer to the Google Calendar API documentation for details.
                // https://developers.google.com/calendar
                console.log('Checking Google Calendar account status...');
            }

            // Function to handle the "Connect Google Calendar" button click
            $('#connectAccountBtn').on('click', function () {
                // Open a new window for Google Calendar OAuth authentication
                authWindow = window.open(
                    '/google-calendar/connect', // Replace with your Google Calendar authentication URL
                    'Google Calendar Authentication',
                    'width=600,height=800'
                );

                // Start an interval to periodically check if the authentication window is closed
                var checkWindowClosed = setInterval(function () {
                    if (authWindow && authWindow.closed) {
                        clearInterval(checkWindowClosed);
                        authWindow = null; // Clear the reference to the closed window
                        // After authentication, check the Google Calendar account status
                        checkGoogleCalendarStatus();
                    }
                }, 1000);
            });

            // Call the function to check Google Calendar account status on page load
            checkGoogleCalendarStatus();
        });
    </script>
<?php /**PATH C:\xampp\htdocs\famosnew\resources\views/user/dashwidgets/calendar.blade.php ENDPATH**/ ?>