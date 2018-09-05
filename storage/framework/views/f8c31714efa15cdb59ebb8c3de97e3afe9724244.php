<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="brand-crum">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul><li><a href="#">Home </a></li>/<li><a href="#"> Energy Supply Chain</a> </li>/ <li><a href="#">Member Registration</a></li></ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Login sec -->
    <section class="Registration-sec">
        <div class="theme-heading no-breck">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>REGISTRATION <span> HERE</span></h2>
                        <p>Neque porro quisquam est</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="theme-contant">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="" method="post" id="add_users" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <!--label for="name" class="cols-sm-2 control-label">Select Role</label>
                                   <div class="cols-sm-10">
                                        <select class="user role"><option>Normal User</option>
                                            <option>Company User</option><option>Member Login</option></select>
                                    </div-->
                            </div>
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">First Name</label>
                                <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter First Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Last Name</label>
                                <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email Address</label>
                                <div class="cols-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="your@email.com" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password ( 4-50 Characters )</label>
                                <div class="cols-sm-10">
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Re-enter Password</label>
                                <div class="cols-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm"  placeholder="Re-Enter Password" required/>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="checkbox-outer">
                                    <input type="checkbox" name="term-condition" required>
                                    <span class="checkmark"></span>
                                </label>
                                <p class="confirm-check">I agree to <a href="#myModal" data-toggle="modal">Terms & Conditions </a>and <a href="#myModal" data-toggle="modal">Privacy Policy </a>that enerGplace is not responsible and liable for missed / wrong information on company page.</p>
                                <p>To continue, please agree to the Terms & Conditions and Privacy Policy.</p>
                            </div>

                            <div class="form-group ">
                                <button href="#" target="_blank" type="submit" id="button" class="btn login-button">Register</button>
                                <p class="between"><span>or</span></p>
                                <a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block blue-bg login-button"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span> Register with Linkedin</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal privacy" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Privacy Policy</h4>
                </div>
                <div class="modal-body">
                    <p style="color: #000">Privacy Clause</p>
                    <p>You hereby confirm that you have read, understood and agreed to be bound by the energplace Privacy Policy. Which is available at
                        www.energeplace.com and the clause herein and the energeplace agreement, as may relate to the processing of your personal information.
                        For the avoidance of doubt, you agree that the said Privacy Polici shall be deemed to be incorporated by reference in to this tearms and
                        condition.</p>
                    <p>
                        In the event you provide personal and financial information relating to third parties, including information relating to your next-of-kin and
                        dependends, for the purpose of opening oparating your account(s) / facility (ies) with us or otherwise subscribing to our products and services
                        , you (a) confirm that you have obtained their consent or are otherwise entitled to provided this information to us and for us to use it in
                        accordance with this tearms and condition and energeplace agreement; (b) agree to ensure that the personal and financial information of the said third parties is accurate; (c) agree to update us in writing in the event of any meterial change to the said persoanl and finacial
                        information; and (d) agree to our right to terminate this terms.</p>
                    <p>
                        In the event you provide personal and financial information relating to third parties, including information relating to your next-of-kin and
                        dependends, for the purpose of opening oparating your account(s) / facility (ies) with us or otherwise subscribing to our products and services
                        , you (a) confirm that you have obtained their consent or are otherwise entitled to provided this information to us and for us to use it in
                        accordance with this tearms and condition and energeplace agreement; (b) agree to ensure that the personal and financial information of the said third parties is accurate; (c) agree to update us in writing in the event of any meterial change to the said persoanl and finacial</p>
                    <p class="text-center"> To continue, please agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.</p>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var form = $("#add_users");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.after(error); },
            rules: {
                password_confirmation: {
                    equalTo: "#password"
                }
            }
        });
        $(document).ready(function(){
            form.on('submit',function(e){
                if(!form.valid()){
                    e.preventDefault();
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>