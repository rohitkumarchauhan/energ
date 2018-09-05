@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 forget-password">
                <div class="page-title">
                    <span class=""></span>
                    <h2 class="big">Retrieve your password</h2>
                    <h3>Enter your email address below and we will send you a new password.</h3>
                </div>
                    <div class="forgot-password-page">
                        @if (session('status'))
                            <div class="alert alert-success" style="text-align: center ">
                                {{ session('status') }}
                            </div>
                        @endif




                        <form class="form form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <div class="input-text">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>
                                </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="buttons">
                                    <a href="{{ url('/') }}" class="button-black">Cancel</a>
                                    <button type="submit" class="button-black">
                                        Send Password Reset Link
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
