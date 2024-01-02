@extends('layouts.app')
	@section('css')
		<!-- Sweet Alert CSS -->
		<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
		<!-- RichText CSS -->
		<link href="{{URL::asset('plugins/richtext/richtext.min.css')}}" rel="stylesheet" />
		<!-- FilePond CSS -->
		<link href="{{URL::asset('plugins/filepond/filepond.css')}}" rel="stylesheet" />
		<!-- Green Audio Players CSS -->
		<link href="{{ URL::asset('plugins/audio-player/green-audio-player.css') }}" rel="stylesheet" />
	@endsection

	@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">{{ __('All Files') }}</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>File Preview</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>AI Details</th>
                                <th>AI Type</th>
                                <th>Public Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>
										<img src="{{ $file->s3_path }}" alt="{{ $file->name }}" width="100">
                                    </td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->description }}</td>
                                    <td>{{ $file->ai_details }}</td>
                                    <td>{{ $file->ai_type }}</td>
                                    <td>
									<a href="{{ $file->s3_path }}" target="_blank"><button>View Url</button></a>
		
									
								
								</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



	@endsection

	@section('js')
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script src="{{URL::asset('plugins/richtext/jquery.richtext.min.js')}}"></script>
	<script src="{{URL::asset('plugins/character-count/jquery-simple-txt-counter.min.js')}}"></script>
	<script src="{{URL::asset('js/export.js')}}"></script>

	<!-- FilePond JS -->
	<script src={{ URL::asset('plugins/filepond/filepond-plugin-file-validate-size.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond-plugin-file-validate-type.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond.min.js') }}></script>
		
	</script>
	@endsection