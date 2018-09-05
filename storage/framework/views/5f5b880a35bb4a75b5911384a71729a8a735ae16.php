<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'supply chain')); ?></title>

    <?php echo $__env->make('main.cssFile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>


    <!-- Styles -->
</head>
<body class=" lna-index-index">

    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('main.jsFiles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('modal'); ?>


</body>
</html>
