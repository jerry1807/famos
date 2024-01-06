@extends('layouts.app')
@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">Ai Profile</h4>
			<ol class="breadcrumb mb-2">

        </ol>
		</div>
		<div class="page-rightheader">
			

		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')




<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">	
				<div class="card-header">
					<h3 class="card-title"><i class="fa-solid fa-scroll-old mr-2 text-info"></i>{{ __('Ai Profile') }}</h3>
				</div>			
				<div class="card-body pt-2">
                <form id="openai-form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-md-center">
        <div class="">

            <div class="chat-message-container" id="chat-system">
               
                <div class="card-body pl-0 pr-0">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div id="chat-container">
                                <!-- Static chat messages go here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box mb-0">
                                <div class="chat-controllers">
                                    <textarea type="message" class="form-control" rows="2" id="message" name="message" placeholder="{{ __('Type your message here...') }}"></textarea>
                                    <div><a class="btn chat-button-icon" href="javascript:void(0)" id="prompt-button" data-bs-toggle="modal" data-bs-target="#promptModal" data-tippy-content="{{ __('Prompt Library') }}"><i class="fa-solid fa-notebook"></i></a></div>
                                    <div><a class="btn chat-button-icon" href="javascript:void(0)" id="mic-button"><i class="fa-solid fa-microphone"></i></a></div>
                                    <div><a class="btn chat-button special-action-color" href="javascript:void(0)" id="stop-button">{{ __('Stop') }} <i class="fa-solid fa-circle-stop ml-1"></i></a></div>
                                    <div><button class="btn chat-button" id="chat-button">{{ __('Send') }} <i class="fa-solid fa-paper-plane-top ml-1"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

				</div>
			</div>
		</div>
      
	</div>



@endsection

@section('js')
<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{URL::asset('plugins/pdf/html2canvas.min.js')}}"></script>
<script src="{{URL::asset('plugins/pdf/jspdf.umd.min.js')}}"></script>
<script src="{{URL::asset('js/export-chat.js')}}"></script>

@endsection