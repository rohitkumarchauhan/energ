@extends('layouts.adminLayout.admin_design')
@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/cropper/cropper.css') }}"/>


@endsection
@section('pageJs')
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/libs/cropper/cropper.js') }}"></script>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var form = $("#add_role");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.after(error); },
                rules: {

                }
            });
            $(document).ready(function(){
                form.on('submit',function(e){
                    if(!form.valid()){
                        e.preventDefault();
                    }
                })
            });


        @foreach($lists as $key =>$list)
            @php
                $valKey = $list['id'];
                @endphp
               $('select option[value="{{$valKey}}"]').prop('selected',true);
            @endforeach


        });
    </script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/roles') }}">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Roles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

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
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card col-md-8">
                    <form class="form-horizontal garment_form_outer" method="POST"
                          action="{{ route('roles.update',$role->id) }}"
                          name="edit_fabrics" id="edit_fabrics" novalidate="novalidate"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="fname" placeholder="" value="{{  $role->name  }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Type</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="permissions[]" multiple  style="height: 200px;" required>
                                        @foreach($permissions as $key =>$val)
                                            <option value="{{ $key }}" >{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>



@endsection









