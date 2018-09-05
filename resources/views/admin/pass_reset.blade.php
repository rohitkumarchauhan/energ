<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
    <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/backend_fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="loginbox">
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
    <form class="form-vertical form-validate-jquery" role="form" method="POST" action="{{ url('/reset/pass/'.$user_id.'/'.$token) }}" id="loginform">{{ csrf_field() }}
    <!-- <div class="control-group normal_text"> <h3><img src="https://cdn-images-1.medium.com/max/800/1*lChA0Ptx9nB8mum3Lk3osg.png" alt="Logo" style="max-width: 45%;" /></h3></div> -->

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="new_pwd" type="password" name="new_pwd" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="confirm_pwd" type="password" name="confirm_pwd" placeholder="Confirm Password" />
                </div>
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-right"><input type="submit" id="login-submit" class="btn btn-success" value="Reset" /></span>
        </div>
    </form>
</div>

<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.login.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/validate.min.js') }}"></script>
<script src="{{ asset('js/form_validation.js') }}"></script>
</body>
</html>