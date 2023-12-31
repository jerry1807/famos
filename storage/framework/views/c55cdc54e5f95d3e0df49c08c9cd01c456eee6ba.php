	
	<?php $__env->startSection('css'); ?>
		<!-- Sweet Alert CSS -->
		<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
		<!-- RichText CSS -->
		<link href="<?php echo e(URL::asset('plugins/richtext/richtext.min.css')); ?>" rel="stylesheet" />
		<!-- FilePond CSS -->
		<link href="<?php echo e(URL::asset('plugins/filepond/filepond.css')); ?>" rel="stylesheet" />
		<!-- Green Audio Players CSS -->
		<link href="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.css')); ?>" rel="stylesheet" />
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
				


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header"> <h2 class="card-title"><?php echo e(__('AI File Upload')); ?></h2></div>
						<div class="card-body">
							<form action="<?php echo e(route('aifiles.upload')); ?>" method="POST" enctype="multipart/form-data">
								<?php echo csrf_field(); ?>
								<div class="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Name:')); ?> <span class="text-muted">(<?php echo e(__('Optional')); ?>)</span></h6>
									<input type="text" class="form-control" id="name" name="name" required>
								</div>
								<br>
								<div class="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Choose File:')); ?> <span class="text-muted">(<?php echo e(__('Optional')); ?>)</span></h6>
									<input type="file" class="form-control" id="file" name="file" required>
								</div>
								<br>
								<!-- Radio Button -->
								<div class="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Scannable by AI:')); ?> <span class="text-muted">(<?php echo e(__('Optional')); ?>)</span></h6>
									<div class="form-check">
										<input type="radio" class="form-check-input" id="ai_yes" name="scannable_by_ai" value="yes">
										<label class="form-check-label" for="ai_yes">Yes</label>
									</div>
									<div class="form-check">
										<input type="radio" class="form-check-input" id="ai_no" name="scannable_by_ai" value="no">
										<label class="form-check-label" for="ai_no">No</label>
									</div>
								</div>
								<!-- Text Area -->
								<div class="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Describe the uploaded File')); ?> <span class="text-muted">(<?php echo e(__('Optional')); ?>)</span></h6>

									<textarea class="form-control" id="description" name="description" rows="4"></textarea>
								</div>
								
								<br><br>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Upload</button>
								</div>

								


							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/richtext/jquery.richtext.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/character-count/jquery-simple-txt-counter.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/export.js')); ?>"></script>

	<!-- FilePond JS -->
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond-plugin-file-validate-size.min.js')); ?>></script>
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond-plugin-file-validate-type.min.js')); ?>></script>
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond.min.js')); ?>></script>
	<!-- Green Audio Players JS -->
	<script src="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/audio-player.js')); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			// Handle form submission
			$('#fileUploadForm').on('submit', function (e) {
				e.preventDefault(); // Prevent the default form submission

				var formData = new FormData(this); // Create FormData object from the form
				formData.append('_token', $('meta[name="csrf-token"]').attr('content')); // Add CSRF token

				$.ajax({
					type: 'POST',
					url: '<?php echo e(route('aifiles.upload')); ?>', // Set the correct route
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
			labelIdle: "<?php echo e(__('Drag & Drop your files or')); ?> <span class=\"filepond--label-action\"><?php echo e(__('Browse')); ?></span><br><span class='restrictions'><span class='restrictions-highlight'>.mp3, .mp4, .mpeg, .mpga, .m4a, .wav, .webm, .ai, .png, .jpg, .jpeg</span></span><br><span class='restrictions'><span class='text-muted'><?php echo e(__('Max Size')); ?>: " + 100 + "MB</span></span>",
			required: true,
			instantUpload:false,
			labelFileProcessingError: (error) => {
			console.log(error);
			}
		
		});
		
		// CREATE FILEPOND INSTANCE
		let pond = FilePond.create(document.querySelector('.filepond'));


		
	</script>
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/aifiles/index.blade.php ENDPATH**/ ?>