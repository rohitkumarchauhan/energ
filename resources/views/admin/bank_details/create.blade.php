@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a>

                <a href="{{ route('bank_details.index')}}">{{ $title }}</a>


                <a href="#" class="current">Add
                    {{ $title }}</a>
            </div>
            <h1>Add {{ $title }}</h1>
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php $errors = json_decode(session('error'));?>
                    @foreach( $errors as  $key=>$error)
                        <strong>{{ $error[0] }}</strong><br/>
                    @endforeach
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('success') !!}</strong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add {{$title}}</h5>
                            <div class="pull-right">
                                <a href="{{route('bank_details.index')}}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal garment_form_outer" method="post"
                                  action="{{ route('bank_details.store') }}"
                                  name="add_bank_details" id="add_bank_details" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input name="name" type="text" value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Bank Name</label>
                                    <div class="controls">
                                        <input name="bank_name" type="text" value="{{old('bank_name')}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Account No</label>
                                    <div class="controls">
                                        <input name="account_no" type="text" value="{{old('account_no')}}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <input name="address" type="text" value="{{old('address')}}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Code</label>
                                    <div class="controls">
                                        <input name="code" type="text" value="{{old('code')}}">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')


@endsection
