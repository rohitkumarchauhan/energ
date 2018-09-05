<?php $__env->startSection('pageCss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJs'); ?>

    <script src="<?php echo e(asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/ckeditor/ckeditor.js')); ?>"></script>

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
                });

                CKEDITOR.replace('editor');
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pages</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/pages')); ?>">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Page</li>
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
                <div class="card col-md-12">
                    <form class="form-horizontal garment_form_outer" method="post"
                          action="<?php echo e(route('pages.store')); ?>"
                          name="add_products" id="add_role" novalidate="novalidate"
                          enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Title</label>
                                <div class="col-sm-5">
                                    <input type="text" name="title" class="form-control" placeholder="" value="<?php echo e(old('name')); ?>" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 text-right control-label col-form-label">Type</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="type_id" required>
                                        <?php $__currentLoopData = $page->getType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="editor" required><?php echo e(old('description')); ?></textarea>
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