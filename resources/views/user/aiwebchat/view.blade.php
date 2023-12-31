@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            padding: 20px;
        }

        .conntection-box {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .plus-icon {
            font-size: 36px;
            cursor: pointer;
        }

        .conntection-box:hover {
            background-color: #ccc; /* Gray background on hover */
            transform: scale(1.1); /* Scale the box on hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Add a box shadow on hover */
        }
</style>
@endsection


@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Communications') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.communications.index')}}"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i>{{ __('AI Panel') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Communications') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')
    <form id="openai-form" action="" method="GET" enctype="multipart/form-data">    
        @csrf
        <div class="row justify-content-md-center">    
            <div class="chat-main-container">
                <div class="chat-sidebar-container">
                    <div class="chat-sidebar-messages">
                        <!-- Sample chat message -->
                        <div class="chat-sidebar-message selected-message" id="sample_message_code">
                            <div class="chat-title" id="title-sample_message_code">
                                Sample Chat Title
                            </div>
                            <div class="chat-info">
                                <div class="chat-count"><span>10</span> messages</div>
                                <div class="chat-date">2 hours ago</div>
                            </div>
                            <div class="chat-actions d-flex">
                                <a href="#" class="chat-edit fs-12" id="sample_message_code"><i class="fa-sharp fa-solid fa-pen-to-square" data-tippy-content="Edit Name"></i></a>
                                <a href="#" class="chat-delete fs-12 ml-2" id="sample_message_code"><i class="fa-sharp fa-solid fa-trash" data-tippy-content="Delete Chat"></i></a>
                            </div>
                        </div>

                        <!-- Add more sample chat messages as needed -->
                    </div>
                    <div class="card-footer">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <a class="btn btn-primary pl-5 pr-5 mt-1" id="new-chat-button">New Chat</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-message-container" id="chat-system">
                    <div class="card-header">
                        <div class="w-100 pt-2 pb-2">
                            <div class="d-flex">
                                <div class="overflow-hidden mr-4"><img alt="Avatar" class="chat-avatar" src="{{ URL::asset('sample_avatar.jpg') }}"></div>
                                <div class="widget-user-name"><span class="font-weight-bold">Sample Chat Name</span><br><span class="text-muted">Sample Sub Name</span></div>
                            </div>
                        </div>
                        <div class="w-50 text-right pt-2 pb-2">                
                            <a id="expand" class="template-button" href="#"><i class="fa-solid fa-bars table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="Show Chat Conversations"></i></a>
                            <a id="export-word" class="template-button mr-2" onclick="exportWord();" href="#"><i class="fa-solid fa-file-word table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="Export Chat Conversation as Word File"></i></a>
                            <a id="export-pdf" class "template-button mr-2" onclick="exportPDF();" href="#"><i class="fa-solid fa-file-pdf table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="Export Chat Conversation as PDF File"></i></a>
                            <a id="export-txt" class="template-button mr-2" onclick="exportTXT();" href="#"><i class="fa-solid fa-file-lines table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="Export Chat Conversation Text File"></i></a>
                            {{-- <a id="clear" class="template-button" onclick="return clearConversation();" href="#"><i class="fa-solid fa-message-xmark table-action-buttons table-action-buttons-big delete-action-button" data-tippy-content="Clear Chat Conversation"></i></a> --}}
                        </div>
                    </div>
                    <div class="card-body pl-0 pr-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="chat-container">
                                    <!-- Sample chat messages go here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-box mb-0">
                                    <div class="input-group file-browser">
                                        <input type="message" class="form-control border-right-0" style="margin-right: 80px;" id="message" name="message" autocomplete="off" placeholder="Enter your question here...">
                                        <label class="input-group-btn">
                                            <button class="btn btn-primary special-btn" id="chat-button">Send</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

