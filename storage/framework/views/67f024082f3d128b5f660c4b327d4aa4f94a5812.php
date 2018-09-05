<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo e(config('app.name', 'supply chain')); ?></title>

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/flot/css/float-chart.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/style.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap/dist/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/back/admin-custom.css')); ?>"/>
    <?php echo $__env->yieldContent('pageCss'); ?>



</head>
<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">

<?php echo $__env->make('layouts.adminLayout.admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('layouts.adminLayout.admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-wrapper">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.adminLayout.admin_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>

<script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/waves.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/sidebarmenu.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/custom.min.js')); ?>"></script>



<?php echo $__env->yieldContent('pageJs'); ?>

<script>

    $(document).on('click', 'a[id^=remove_image-]', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });
        var id = $(this).attr('data-id');

        if (confirm('Are you sure you want to Delete this Image')) {
            $.ajax({
                url: '<?php echo e(route('media.delete-image')); ?>',
                type: 'POST',
                data: {
                    id: id,
                },
            }).done(function (response) {

                window.location.reload();
            });

        }
    });


    $(document).on('click', '.delete-model', function (e) {

        if (!confirm('Are you sure you want to Delete this')) {
            e.preventDefault();
        }


    });

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);


</script>


<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
