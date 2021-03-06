<?php $__env->startSection('pageCss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/cropper/cropper.css')); ?>"/>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJs'); ?>
    <script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/cropper/cropper.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Change Password</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                    <form class="form-horizontal" method="post" action="<?php echo e(url('/admin/update-pwd')); ?>"
                          name="add_users" id="add_users" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="current_pwd" id="current_pwd" class="form-control" placeholder="" value="<?php echo e(old('current_pwd')); ?>" required>
                                    <span id="chkPwd"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="" value="<?php echo e(old('email')); ?>" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control"  name="confirm_pwd" id="password" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-6">
                                    <input type="hidden" name="orientation" />
                                    <div class="img-container cropper-container" style="display: none">
                                        <img id="image" src="<?php echo e(asset('images/blog.jpg')); ?>" alt="Picture">
                                    </div>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(".select2").select2();
        var form = $("#add_users");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.after(error); },
            rules: {
                confirm_pwd: {
                    equalTo: "#new_pwd"
                }
            }
        });

        $(document).ready(function(){
            form.on('submit',function(e){
                if(!form.valid()){
                    e.preventDefault();
                }
            });

            $("#current_pwd").keyup(function(){
                var current_pwd = $("#current_pwd").val();
                $.ajax({
                    type:'get',
                    url:'<?php echo e(url('/admin/check-pwd')); ?>',
                    data:{current_pwd:current_pwd},
                    success:function(resp){
                        //alert(resp);
                        if(resp=="false"){
                            $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
                        }else if(resp=="true"){
                            $("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
                        }
                    },error:function(){
                        alert("Error");
                    }
                });
            });
        });
        /*-----------------------Start Image cropping-------------------------------*/

        /*-----------------------End Image cropping-------------------------------*/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout.admin_design', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>