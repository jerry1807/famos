@extends('layouts.app')
@section('css')
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        padding: 20px;
    }

    .connection-box {
        background-color: #ffffff;
        padding: 20px 0; /* Added vertical padding */
        text-align: center;
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px; /* Add rounded corners */
    }

    .plus-icon {
        font-size: 36px;
        cursor: pointer;
    }

    .connection-box:hover {
        background-color: #ccc;
        transform: scale(1.1);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .connection-box i {
        font-size: 36px;
    }

    /* Custom icon colors */
    .facebook-messenger {
        color: #0084FF; /* Facebook Messenger blue */
    }

    .instagram {
        color: #C13584; /* Instagram pink */
    }

    .whatsapp {
        color: #25D366; /* WhatsApp green */
    }

    .email {
        color: #FF5733; /* Custom email color */
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
<div class="grid-container">
    <div class="connection-box facebook-messenger">
        <i class="fab fa-facebook-messenger"></i>
    </div>
    <div class="connection-box ">
        <i class="fab fa-instagram"></i>
    </div>
    <div class="connection-box whatsapp">
        <i class="fab fa-whatsapp"></i>
    </div>


    <a href="emailcomposer">
    <div class="connection-box email">
        <i class="fas fa-envelope"></i>
    </div>
</a>



    
    <div class="connection-box">
    <i class="plus-icon">+</i>
</div>

    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
    <div class="connection-box">
                <i class="plus-icon">+</i>

    </div>
</div>
@endsection
