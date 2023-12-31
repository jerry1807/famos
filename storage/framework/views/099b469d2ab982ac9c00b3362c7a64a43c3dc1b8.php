
<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"><?php echo e(__('AI BOTS')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('user.communications.index')); ?>"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i><?php echo e(__('AI Panel')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('AI BOTS')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<iframe src="https://bandraroad-famos-autogen-chatbot.hf.space/?userid=<?php echo e(auth()->user()->email); ?>" width="1000" height="700" frameborder="0" scrolling="auto"></iframe>
   
   
    <h2><?php echo e(auth()->user()->email); ?></h2>
        
        <h2><?php echo e(auth()->user()->email); ?></h2>
        <h2>asdsadasdasds</h2>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/aibots/index.blade.php ENDPATH**/ ?>