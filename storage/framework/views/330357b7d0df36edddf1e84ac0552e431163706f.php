<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="brand-crum">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul><li><a href="#">Home </a></li>/<li><a href="#">About Us</a></li></ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="aboutus-sec">
        <div class="about-heading theme-heading no-breck">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ABOUT <span>US</span></h2>
                        <p>Neque porro quisquam est</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="about-contant theme-contant">
                    <div class="col-sm-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/EIdkOWmQaaw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.About Us -->

    <!-- update Sec -->
    <section class="update-sec">
        <div class="update theme-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>LOREM <span>IPSUM</span></h2>
                        <p>Neque porro quisquam est</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="update-contant">
            <div class="container">
                <div class="row">
                    <div class="about-team">
                        <div class="col-md-6">
                            <img src="images/update-sec.jpg" class="img-responsive">
                        </div>

                        <div class="col-md-6">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Upade Sec-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>