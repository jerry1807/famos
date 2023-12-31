@extends('layouts.app')

@section('css')
    <!-- Sweet Alert CSS -->
    @section('css')
    <!-- Sweet Alert CSS -->
    <style>
        .small-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #f5f5f5;
            position: relative;
            margin: 1px;
            border-radius: 10px; /* Rounded corners */
            background-color: #f5f5f5; /* Background color for a minimal look */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Box shadow */
            padding-bottom: 30px; /* 20px bottom padding */
        }

        .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            font-weight: normal;
            font-size: 18px;
            color: #888;
        }

        .pen-icon {
            position: absolute;
            top: 5px;
            right: 30px;
            cursor: pointer;
            font-weight: normal;
            font-size: 18px;
            color: #888;
        }

        .box-text {
            margin-top: 20px;
            text-align: center;
        }

        .chat-box {
            margin-bottom: 20px;
        }

    </style>
    <link href="{{ URL::asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">
</style>
@endsection

@section('page-header')
    <!-- PAGE HEADER -->
    <div class="page-header mt-5-7">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">AI WEB CHAT</h4>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-messages-question mr-2 fs-12"></i>{{ __('User') }}</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.chat') }}"> {{ __('AI Chat Assistants') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('#') }}"> TRAVELLER BOT</a></li>
            </ol>
        </div>
    </div>
    <!-- END PAGE HEADER -->
@endsection
@section('content')
<form id="openai-form" action="" method="GET" enctype="multipart/form-data">		
    <div class="row justify-content-md-center">


        <h2>{{ auth()->user()->email }}</h2>
        
        <h2>{{ auth()->user()->email }}</h2>
        <h2>asdsadasdasds</h2>
    </div>
</form>



@endsection

@section('js')

<script src="{{ URL::asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ URL::asset('plugins/pdf/html2canvas.min.js') }}"></script>
<script src="{{ URL::asset('plugins/pdf/jspdf.umd.min.js') }}"></script>
<script src="{{ URL::asset('js/export-chat.js') }}"></script>

<script>
$(document).ready(function() {
    const chatContainer = $('#chat-container');
    const messageInput = $('#messageInput');
    const sendMessageButton = $('#sendMessage');
    const chatSidebarMessages = $('.chat-sidebar-messages');

    // Function to display a user's message
    function displayUserMessage(message) {
        const messageElement = `
            <div class="msg user-msg text-end right-msg">
                <div class="message-img"></div>
                <div class="message-bubble">
                    <div class="msg-text text-black p-2 rounded">${message}</div>
                </div>
            </div>
        `;
        chatContainer.append(messageElement);
    }


    // Function to save the chat to the database
    function saveChatToDatabase(userMessage, botResponse) {
        // Prepare the data to be sent to the server
        var data = {
            user_message: userMessage,
            bot_response: botResponse,
            // Other data if needed
        };

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: 'post',
            url: 'aiwebchat/save',
            data: data,
            dataType: 'json',
            success: function(response) {
                console.log('Chat saved successfully:', response.message);
            },
            error: function(error) {
                console.error('Error while saving chat:', error);
            }
        });
    }

    // Function to display user's message history
    function displayUserMessageHistory(userMessages) {
        const userMessageHistory = $('#userMessageHistory');
        console.log(userMessages);
        userMessageHistory.empty(); // Clear the user message history container

        userMessages.forEach(function (message) {
            const messageElement = `
                <div class="message-history">
                    <p>${message.user_message}</p>
                </div>
            `;
            userMessageHistory.append(messageElement);
        });
    }

    // Function to fetch and display user's message history
    function fetchUserMessageHistory() {
    console.log('Fetching user message history...'); // Debug log: indicate the function is called
    $.ajax({
        type: 'GET',
        url: '{{ route('aiwebchat.history') }}',
        success: function (userMessages) {
            console.log('Received user message history:', userMessages); // Debug log: show the received data
            displayUserMessageHistory(userMessages);
        },
        error: function () {
            console.error('Error fetching user message history.'); // Debug log: indicate an error
        }
    });
}


    // Call the function to fetch and display user's message history when the page loads
    fetchUserMessageHistory();

    // Event listener for sending a message
    sendMessageButton.click(function() {
        const message = messageInput.val();
        if (message.trim() !== '') {
            sendMessageToAPI(message);
        }
    });
});
</script>
@endsection
