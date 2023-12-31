@extends('layouts.app')

@section('css')
    <!-- Sweet Alert CSS -->
    <link href="{{ URL::asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" />
@endsection

@section('page-header')
    <!-- PAGE HEADER -->
    <div class="page-header mt-5-7">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">AI Travel Bot</h4>
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
<iframe
	src="https://harsh12-netflix-movie-recommender.hf.space"
	frameborder="0"
	width="1250"
	height="750"
></iframe>


@endsection
