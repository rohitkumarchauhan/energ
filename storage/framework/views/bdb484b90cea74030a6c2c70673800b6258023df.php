<?php $__env->startSection('pageCss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/cropper/cropper.css')); ?>"/>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJs'); ?>
    <script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/cropper/cropper.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            var form = $("#add_role");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.after(error); },
                rules: {

                }
            });
            $(document).ready(function(){
                form.on('submit',function(e){
                    if(!form.valid()){
                        e.preventDefault();
                    }
                })
            });


        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $valKey = $list['id'];
                ?>
               $('select option[value="<?php echo e($valKey); ?>"]').prop('selected',true);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/roles')); ?>">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Roles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php if(\Illuminate\Support\Facades\Session::has('error')): ?>
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php $errors = json_decode(session('error'));?>
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <strong><?php echo e($error[0]); ?></strong><br/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo session('success'); ?></strong>
        </div>
    <?php endif; ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card col-md-8">
                    <form class="form-horizontal garment_form_outer" method="POST"
                          action="<?php echo e(route('roles.update',$role->id)); ?>"
                          name="edit_fabrics" id="edit_fabrics" novalidate="novalidate"
                          enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>


                        <div class="card-body">

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="fname" placeholder="" value="<?php echo e($role->name); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Type</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="permissions[]" multiple  style="height: 200px;" required>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" ><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>



<?php $__env->stopSection(); ?>










<?php echo $__env->make('layouts.adminLayout.admin_design', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>