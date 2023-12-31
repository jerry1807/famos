@extends('layouts.app') 

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Connect to Google Calendar</div>
                    <div class="card-body">
                        <p>Click the button below to connect to your Google Calendar:</p>
                        <a href="{{ $authUrl }}" class="btn btn-primary">Connect to Google Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
