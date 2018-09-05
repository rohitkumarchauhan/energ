@extends('layouts.app')
@section('js')
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection
@section('content')

    <!-- Login sec -->
    <section class="brand-crum">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul><li><a href="#">Home </a></li>/<li><a href="#"> Energy Supply Chain</a> </li>/ <li><a href="#">Member Login</a></li></ul>
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
                        <h2>LOGIN <span> HERE</span></h2>
                        <p>Neque porro quisquam est</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="theme-contant">
                    <div class="col-md-6">
                        <div class="member-img">
                            <img src="images/memer-login.jpg" class="img-responsive">
                        </div>
                        <h3 class="color-red">Be a Member today !</h3>
                        <p>One-stop center to learn everything and stay up to date on Energy Industry</p>

                        <p>Share your expertise and get recognized by Industry Experts</p>

                        <p>Participate and Enjoy points to be redeemed (free gifts)</p>
                    </div>
                    <div class="col-md-6">
                        <form class="" method="post" action="{{route('login')}}" id="login-member">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email Address</label>
                                <div class="cols-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your Email" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <input type="password" class="form-control" name="password" placeholder="Enter your Password" required/>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="checkbox-outer">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <p class="confirm-check">Remember Me</p>
                            </div>

                            <div class="form-group ">
                                <label class="checkbox-outer">
                                    <input type="checkbox" name="term-conditions" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <p class="confirm-check">I agree to <a href="#">Terms & Conditions </a>and <a href="#">Privacy Policy </a>that enerGplace is not responsible and liable for missed / wrong information on company page.</p>
                                <p>To continue, please agree to the Terms & Conditions and Privacy Policy.</p>
                            </div>

                            <div class="form-group ">
                                <p><button target="_blank" type="submit" id="button" class="btn login-button">LOGIN</button></p>

                                <p>If no existing account, <a href="{{route('register')}}">JOIN FOR FREE</a></p>
                                <P>Forgot your <a href="forgot-password.html">Password?</a></P>
                                <a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block blue-bg login-button"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span> Register with Linkedin</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        var form = $("#login-member");
        form.validate();
        $(document).ready(function(){
            form.on('submit',function(e){
                if(!form.valid()){
                    e.preventDefault();
                }
            })
        });
    </script>
@endsection