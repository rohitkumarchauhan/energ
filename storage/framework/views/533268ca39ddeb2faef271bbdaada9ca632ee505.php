<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    </div>
<?php endif; ?>
<?php if(\Illuminate\Support\Facades\Session::has('error')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo session('error'); ?>

    </div>
<?php endif; ?>
<?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo session('success'); ?>

    </div>
<?php endif; ?>