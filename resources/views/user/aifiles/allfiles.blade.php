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
	<div class="card border-0">	
					
				</div>
			


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header"> <h2 class="card-title">{{ __('All Files') }}</h2></div>
						<div class="card-body">
                        <ul>
                            @foreach ($files as $file)
                                <li>
                                    <p>{{ $file->name }}</p>
                                    <a href="{{ Storage::disk('s3')->url($file->file_path) }}" target="_blank">View File</a>
                                </li>
                            @endforeach
                        </ul>
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
	<!-- Green Audio Players JS -->
	<script src="{{ URL::asset('plugins/audio-player/green-audio-player.js') }}"></script>
	<script src="{{ URL::asset('js/audio-player.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			// Handle form submission
			$('#fileUploadForm').on('submit', function (e) {
				e.preventDefault(); // Prevent the default form submission

				var formData = new FormData(this); // Create FormData object from the form
				formData.append('_token', $('meta[name="csrf-token"]').attr('content')); // Add CSRF token

				$.ajax({
					type: 'POST',
					url: '{{ route('aifiles.upload') }}', // Set the correct route
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.status === 'success') {
							// Handle success, e.g., display a success message
							toastr.success('File uploaded successfully');
						} else {
							// Handle error, e.g., display an error message
							toastr.error(data.message);
						}
					},
					error: function (data) {
						// Handle error, e.g., display an error message
						toastr.error('An error occurred during file upload');
					},
				});
			});
		});

		FilePond.registerPlugin(
			FilePondPluginFileValidateSize,
		);

		FilePond.setOptions({
			maxFileSize: 25 + 'MB',
			maxFiles: 1,
			labelIdle: "{{ __('Drag & Drop your files or') }} <span class=\"filepond--label-action\">{{ __('Browse') }}</span><br><span class='restrictions'><span class='restrictions-highlight'>.mp3, .mp4, .mpeg, .mpga, .m4a, .wav, .webm, .ai, .png, .jpg, .jpeg</span></span><br><span class='restrictions'><span class='text-muted'>{{ __('Max Size') }}: " + 100 + "MB</span></span>",
			required: true,
			instantUpload:false,
			labelFileProcessingError: (error) => {
			console.log(error);
			}
		
		});
		
		// CREATE FILEPOND INSTANCE
		let pond = FilePond.create(document.querySelector('.filepond'));


		
	</script>
	@endsection