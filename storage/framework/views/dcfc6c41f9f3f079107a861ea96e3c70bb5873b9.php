<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


        <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">

                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <a href="<?php echo e(route('users.index')); ?>">
                                <div class="card card-hover">
                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                        <h6 class="text-white">Users</h6>
                                    </div>
                                </div>
                                </a>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h6 class="text-white">Charts</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                    <h6 class="text-white">Widgets</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                    <h6 class="text-white">Tables</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                    <h6 class="text-white">Full Width</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                    <h6 class="text-white">Forms</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                    <h6 class="text-white">Buttons</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                                    <h6 class="text-white">Elements</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                                    <h6 class="text-white">Calnedar</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                    <h6 class="text-white">Errors</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>



                </ul>
            </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>