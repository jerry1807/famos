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



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="profile-form">
                <h2>About Me</h2>
                <div class="form-content">
                    <p class="form-text">Enter information about yourself:</p>
                    <textarea id="about-me-text" class="form-control" rows="4">{{ $aboutMeData }}</textarea>
                    <br>
                    <button class="btn btn-primary update-button">Update</button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="profile-form">
                <h2>About My Family</h2>
                <div class="form-content">
                    <p class="form-text">Enter information about your family:</p>
                    <textarea id="family-text" class="form-control" rows="4">{{ $familyData }}</textarea>
                    <br>
                    <button class="btn btn-primary update-button">Update</button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="profile-form">
                <h2>Travel Preferences</h2>
                <div class="form-content">
                    <p class="form-text">Enter your travel preferences:</p>
                    <textarea id="travel-preferences-text" class="form-control" rows="4">{{ $travelPreferencesData }}</textarea>
                    <br>
                    <button class="btn btn-primary update-button">Update</button>
                </div>
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
<sc>
@endsection