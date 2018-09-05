@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a> <a href="{{ route('liningmaterial.index')}}">{{ $title }}</a> <a href="#"
                                                                                              class="current">Edit</a>
            </div>
            <h1>{{ $model->name }}</h1>
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
                            <h5>Edit {{ $model->name }}</h5>


                            <div class="pull-right">
                                <a href="{{route('liningmaterial.index')}}" title="Back"
                                   class="btn btn-default">Back</a>


                            </div>
                        </div>
                        <div class="widget-content ">
                            <form class="form-horizontal garment_form_outer" method="POST"
                                  action="{{ route('bank_details.update',$model->id) }}"
                                  name="edit_fabrics" id="edit_fabrics" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input name="name" type="text" value="{{  $model->name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Bank Name</label>
                                    <div class="controls">
                                        <input name="bank_name" type="text" value="{{ $model->bank_name}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Account No</label>
                                    <div class="controls">
                                        <input name="account_no" type="text" value="{{   $model->account_no  }}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <input name="address" type="text" value="{{$model->address}}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Code</label>
                                    <div class="controls">
                                        <input name="code" type="text" value="{{$model->code}}">
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

    <script>


    </script>
@endsection









