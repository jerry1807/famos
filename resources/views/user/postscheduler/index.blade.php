@extends('layouts.app')

@section('css')
    <!-- Sweet Alert CSS -->
    <link href="{{ URL::asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" />
    <!-- Custom CSS for Circle Avatars -->
    <!-- Include jQuery (required for Bootstrap Datepicker) -->
    <style>
        .avatar {
            border-radius: 50%;
            width: 50px; /* Adjust the width as needed */
            height: 50px; /* Adjust the height as needed */
            object-fit: cover; /* Ensures the image fills the circle */
            margin-right: 10px; /* Optional margin between avatar and account name */
        }

        .account-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px; /* Optional margin between account items */
        }

        .account-checkbox {
            margin-right: 5px; /* Optional margin between checkbox and avatar */
        }

        /* iPhone frame styles */
        .iphone-frame {
            max-width: 360px; /* Maximum width for iPhone frame */
            margin: 0 auto;
            position: relative;
        }

        .iphone-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
        }

        .iphone-preview {
            padding: 20px;
            color: #333;
            /* Add any additional styles for your preview content */
        }

        .iphone-container {
            height: 680px; /* Adjust the height as needed */
            overflow: auto; /* Add scrollbars if content overflows */
            padding: 10px; /* Add some padding to the box */
        }


        /* Style the tab switch as a Pill with a small box shadow */
        .nav-link {
            border-radius: 20px; /* Make it pill-shaped */
            padding: 10px 20px ; /* Adjust padding as needed */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a small box shadow */
        }

        /* Style the active tab link differently if desired */
        .nav-link.active {
            /* Add your active tab styles here */
        }

    </style>
@endsection

@section('page-header')
    <!-- PAGE HEADER -->
    <div class="page-header mt-5-7">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">AI Social Post Scheduler</h4>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-messages-question mr-2 fs-12"></i>{{ __('User') }}</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.chat') }}"> {{ __('Social Media Scheduler') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('#') }}"> Social Media Scheduler</a></li>
            </ol>
        </div>
    </div>
    <!-- END PAGE HEADER -->
@endsection

@section('content')
    <!-- POST SCHEDULER UI -->
        <div class="row">
            



        <!-- Column 1: Selecting Accounts -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Select Accounts
                        </div>


                        <div class="card-body">
                            <!-- Tab switch for account types -->
                            <ul class="nav nav-tabs" id="accountTabs" role="tablist">
                                <li class="nav-item">
                                      <a class="nav-link active" id="all-tab" data-toggle="tab" href="#allAccounts" role="tab" aria-controls="allAccounts" aria-selected="true">ALL</a>
                                 </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="instagram-tab" data-toggle="tab" href="#instagramAccounts" role="tab" aria-controls="instagramAccounts" aria-selected="false">Instagram</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="facebook-tab" data-toggle="tab" href="#facebookAccounts" role="tab" aria-controls="facebookAccounts" aria-selected="false">Facebook</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Linkedin-tab" data-toggle="tab" href="#LinkedinAccounts" role="tab" aria-controls="LinkedinAccounts" aria-selected="false">Linkedin</a>
                                </li>
                            </ul>

                           <!-- Tab content for account selection -->
                                    <div class="tab-content" id="accountTabContent">
                                        <div class="tab-pane fade show active" id="allAccounts" role="tabpanel" aria-labelledby="all-tab">
                                            
                                        </div>


                                        <div class="tab-pane fade" id="instagramAccounts" role="tabpanel" aria-labelledby="instagram-tab">
                                        @include('user.postscheduler.connectInstagram')

                                        
                                        </div>


                                        <div class="tab-pane fade" id="facebookAccounts" role="tabpanel" aria-labelledby="facebook-tab">

                                        @include('user.postscheduler.connectFacebook')

                                        </div>

                                        <div class="tab-pane fade" id="LinkedinAccounts" role="tabpanel" aria-labelledby="Linkedin-tab">
                                        @include('user.postscheduler.connectLinkedin')

                                        </div>
                                    </div>



                        </div>
                    </div>
                </div>



            
<!-- Column 2: Content -->
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Content
        </div>
        <div class="card-body">
            <!-- Write AI Content Button -->
            <button class="btn btn-primary mb-3">Write AI Content</button>
            
            <!-- AI Image Button -->
            <button class="btn btn-success mb-3">AI Image</button>
            
            <form>
                <div class="form-group">
                    <label for="postText">Post Text</label>
                    <textarea class="form-control" id="postText" name="postText" rows="10" placeholder="Enter your post text"></textarea>
                </div>
                <div class="form-group">
                    <label for="scheduleDate">Schedule Date and Time</label>
                    <input type="text" class="form-control datepicker" id="scheduleDate" placeholder="Select a date and time" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
            
            <!-- Column 3: Preview -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Preview
                    </div>
                    <div class="card-body">
                        <!-- AI Ideas Box -->
                      
                        
                        <!-- iPhone frame and preview content -->
                        <div class="iphone-frame iphone-container">
                            <img src="/images/iphone.png" alt="iPhone Mockup" class="iphone-content">
                            <div class="iphone-preview">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END POST SCHEDULER UI -->
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {
    $('#accountTabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});


$(document).ready(function () {
    // Load accounts based on the selected tab
    $('.nav-link').on('click', function () {
        var type = $(this).attr('aria-controls');
        $.ajax({
            url: '/get-accounts/' + type,
            method: 'GET',
            success: function (data) {
                // Update the account list with the retrieved data
                $('#accountTabContent').html(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    // Update post content
    $('#updatePostBtn').on('click', function () {
        var postText = $('#postText').val();
        $.ajax({
            url: '/update-post',
            method: 'POST',
            data: {
                postText: postText
            },
            success: function (response) {
                // Handle the response as needed
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});

</script>
<script>
    $(document).ready(function () {
    // Initialize the date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd hh:ii', // Define the date format as needed
        autoclose: true,
        todayHighlight: true,
    });

    // Load accounts based on the selected tab
    $('.nav-link').on('click', function () {
        var type = $(this).attr('aria-controls');
        $.ajax({
            url: '/get-accounts/' + type,
            method: 'GET',
            success: function (data) {
                // Update the account list with the retrieved data
                $('#accountTabContent').html(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    // Update post content
    $('#updatePostBtn').on('click', function () {
        var postText = $('#postText').val();
        var scheduleDate = $('#scheduleDate').val(); // Get the selected schedule date
        $.ajax({
            url: '/update-post',
            method: 'POST',
            data: {
                postText: postText,
                scheduleDate: scheduleDate, // Send the schedule date to the server
            },
            success: function (response) {
                // Handle the response as needed
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});
</script>
@endsection
