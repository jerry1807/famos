<style>

.card {
    border-radius: 10px;
    margin-bottom: 20px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

/* Style the chat header */
.card-header {
    background-color: #007bff;
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 10px 15px;
}

/* Style the chat body */
.chat-body {
    height: 200px; /* Limit chat height and add scroll if it overflows */
    overflow-y: auto;
    padding: 10px;
}

/* Style chat messages */
.chat-body .bg-primary {
    color: #fff;
    border-radius: 5px;
    padding: 5px 10px;
    margin-bottom: 10px;
    max-width: 70%;
}

.chat-body .bg-light {
    background-color: #f0f0f0;
    color: #000;
    border-radius: 5px;
    padding: 5px 10px;
    margin-bottom: 10px;
    max-width: 70%;
}

/* Style the input and send button */
.card-footer {
    background-color: #fff;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 10px;
}

.card-footer .form-control {
    border-radius: 25px;
}

.card-footer #sendMessage {
    border-radius: 25px;
    background-color: #007bff;
    color: #fff;
    transition: background-color 0.3s ease;
}

.card-footer #sendMessage:hover {
    background-color: #0056b3;
}

</style>




<script>
    $(document).ready(function () {
        const chatBody = $('.chat-body');
        const messageInput = $('#messageInput');
        const sendMessageButton = $('#sendMessage');

        function displayMessage(message, sender) {
            const messageClass = sender === 'user' ? 'text-end bg-primary text-white' : 'text-start bg-light';
            const messageElement = `
                <div class="mb-2 p-2 rounded ${messageClass}">${message}</div>
            `;
            chatBody.append(messageElement);
            chatBody.scrollTop(chatBody[0].scrollHeight);
        }

        sendMessageButton.click(function () {
            const message = messageInput.val();
            if (message.trim() !== '') {
                // Display the user's message
                displayMessage(message, 'user');

                // Send the user's message as a query to the API
                const apiUrl = 'http://159.89.239.225:8082/api/ai-web-search?query=' + encodeURIComponent(message);

                // Log the sent API request
                console.log('Sent API Request:', apiUrl);

                $.ajax({
                    type: 'POST', // Change to GET method
                    url: apiUrl,
                    success: function (response) {
                        // Display the API response in the chat
                        displayMessage(response, 'bot');

                        // Log the received API response
                        console.log('Received API Response:', response);
                    },
                    error: function () {
                        displayMessage('Error fetching response.', 'bot');
                    }
                });

                messageInput.val('');
            }
        });
    });
</script>
