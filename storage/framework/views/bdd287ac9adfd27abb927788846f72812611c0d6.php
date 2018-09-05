<header>
    <nav class="navbar ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="Site-logo" href="index.html"><img src="images/logo.png" class="img-responsive"></a>
            </div>
            <div class="search-sec">
                <div class="join-user">
                    <?php if(empty(auth()->user()->id)): ?>
                        <div class="join-login">
                            <a href="<?php echo e(route('register')); ?>"><span class="color-red"><i class="fa fa-user" aria-hidden="true"></i></span>Join</a>
                            <a href="<?php echo e(route('login')); ?>"><span class="color-green"><i class="fa fa-sign-in" aria-hidden="true"></i></span>Login</a>
                        </div>
                    <?php else: ?>
                        <div class="user-logout">
                            <img src="images/user.png" class="img-responsive"> <span class="user-nm"><?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->lastname); ?></span>
                            <a href="<?php echo e(route('logout')); ?>"><span class="color-green"><i class="fa fa-sign-out" aria-hidden="true"></i></span>Logout</a>
                        </div>
                    <?php endif; ?>
                </div>
                <span><input type="text" placeholder="Search"><button type="button"><i class="fa fa-search" aria-hidden="true"></i></button></span></div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo e(route('about-us')); ?>">About Us </a></li>
                    <li><a href="#">Events</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ENERGY SUPPLY CHAIN <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Leval 1 to 6</a></li>

                        </ul>
                    </li>
                    <li><a href="#">Advertise Here</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Media <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Picture & Video Gallery</a></li>
                            <li><a href="#">Training Center</a></li>
                            <li><a href="#">Live TV</a></li>
                        </ul>


                    </li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact Us <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Feedback & Contact us</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>