<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="accountDetails">
    <!-- Initially, display the "Connect Gmail" button -->
    <button id="connectGmail" class="btn btn-primary">Connect Gmail</button>
</div>

<div id="emailList" style="overflow-y: scroll; max-height: 400px;">
    <!-- Emails will be displayed here -->
</div>

<script>
    $(document).ready(function () {
        // Function to check Gmail account details
        function checkGmailAccountDetails() {
            // Make an AJAX request to check the user's authentication status
            $.ajax({
                url: "<?php echo e(route('gmail-widget.account-details')); ?>",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data.accountType === 'gmail') {
                        // User is signed in, display account details
                        var accountDetails = `
                            <p>Account Name: ${data.accountName}</p>
                            <p>Account ID: ${data.accountId}</p>
                        `;
                        $("#accountDetails").html(accountDetails);

                        // Change the button to "Connected" and make it green
                        $("#connectGmail")
                            .removeClass('btn-primary')
                            .addClass('btn-success')
                            .text('Connected')
                            .prop('disabled', true);

                        // Enable the "Fetch Last 10 Emails" button
                        $("#fetchLast10Emails").prop('disabled', false);
                    } else {
                        // User is not signed in, keep displaying the "Connect Gmail" button
                        $("#fetchLast10Emails").prop('disabled', true);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + status + " - " + error);
                }
            });
        }

        // Function to fetch the last 10 emails
        function fetchLast10Emails() {
            // Make an AJAX request to your controller's method to fetch emails
            $.ajax({
                url: "<?php echo e(route('gmail-widget.fetch-new-emails')); ?>", // Updated with the correct route
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // Handle the response data here and display the emails
                    // You can format and display the emails in the way you want
                    var emailList = $("#emailList");
                    emailList.empty(); // Clear previous emails

                    // Loop through the emails and add them to the list with a border
                    $.each(data.new_emails, function (index, email) {
                        var emailItem = `
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                                <p>Subject: ${email.subject}</p>
                                <p>Sender: ${email.sender}</p>
                                <p>Date: ${email.date}</p>
                            </div>
                        `;
                        emailList.append(emailItem);
                    });

                    // Hide the "Connect Gmail" button after emails are loaded
                    $("#connectGmail").hide();
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + status + " - " + error);
                }
            });
        }

        // Check Gmail account details when the page loads
        checkGmailAccountDetails();

        // Automatically fetch the last 10 emails when the page loads
        fetchLast10Emails();
    });
</script>
<?php /**PATH /var/www/html/resources/views/user/dashwidgets/listmail.blade.php ENDPATH**/ ?>