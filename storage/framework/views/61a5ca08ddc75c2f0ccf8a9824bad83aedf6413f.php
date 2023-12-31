

<?php $__env->startSection('css'); ?>
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />


    <style>



.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    max-width: 100%;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
}

.box {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.connect-button {
    display: block;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 15px;
    transition: background-color 0.3s;
    box-sizing: border-box;
}

.connect-button:hover {
    background-color: #0056b3;
}

h2 {
    font-size: 20px;
}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"><?php echo e(__('Dashboard')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i><?php echo e(__('AI Panel')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Dashboard')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="">
    <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <?php echo $__env->make('user.dashwidgets.calendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
                </div>
            </div>
            

            <div class="col-md-4">
                <div class="card">
                <div class="card-body">

                <?php echo $__env->make('user.dashwidgets.listmail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                </div>
            </div>



            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Google Drive</h5>
                        <p class="card-text">Connect to your Google Drive.</p>
                        <a href="#" class="btn btn-primary">Connect</a>
                    </div>
                </div>
            </div>
        </div>
</div>

	<!-- END USER PROFILE PAGE -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Chart JS -->
	<script src="<?php echo e(URL::asset('plugins/chart/chart.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the "Connect" button element
            const connectButton = document.getElementById('connect-google-calendar');

            // Define the Google Calendar OAuth URL
            const googleCalendarAuthUrl = '<?php echo e(route('google-calendar.connect')); ?>';

            // Add a click event listener to the button
            connectButton.addEventListener('click', function () {
                // Open a popup window for Google Calendar authentication
                const popupWidth = 600;
                const popupHeight = 600;
                const left = (window.innerWidth - popupWidth) / 2;
                const top = (window.innerHeight - popupHeight) / 2;
                const popupOptions = `width=${popupWidth},height=${popupHeight},left=${left},top=${top},toolbar=0,location=0,menubar=0`;

                // Open the popup window
                window.open(googleCalendarAuthUrl, 'google-calendar-auth', popupOptions);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\famosnew\resources\views/user/dashwidgets/index.blade.php ENDPATH**/ ?>