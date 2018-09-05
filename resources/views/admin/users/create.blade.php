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
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
        <form >
            </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card col-md-8">
                    <form class="form-horizontal" method="post" action="{{ route('users.store') }}"
                          name="add_users" id="add_users" novalidate="novalidate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="fname" placeholder="" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="lname" placeholder="" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control"  name="password" id="password" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirmation" id="c_password" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Role</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        @foreach($roles as $key =>$val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Profile Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="inputImage"  name="image" class="multifileselect" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-6">
                                    <input type="hidden" name="orientation" />
                                    <div class="img-container cropper-container" style="display: none">
                                        <img id="image" src="{{asset('images/blog.jpg')}}" alt="Picture">
                                    </div>
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
@section('scripts')
    <script>
        $(".select2").select2();
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
/*-----------------------Start Image cropping-------------------------------*/
        var $image = $('#image');
        var options = {
            preview: '.img-preview',
            aspectRatio: 1/1,
            crop: function(event) {
                var orientation = event.detail.width+","+event.detail.height+","+event.detail.x+","+event.detail.y;
                $("input[name=orientation]").val(orientation);
            }
        };

        var URL = window.URL || window.webkitURL;
        var uploadedImageURL;

        var $inputImage = $('#inputImage');

        $inputImage.change(function () {
            var files = this.files;
            var file;

            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    uploadedImageName = file.name;
                    uploadedImageType = file.type;
                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                    }

                    uploadedImageURL = URL.createObjectURL(file);
                    $image.attr('src', uploadedImageURL).cropper(options);
                    $('.cropper-container').show();
                } else {
                    window.alert('Please choose an image file.');
                }
            }
        });

        /*-----------------------End Image cropping-------------------------------*/
    </script>
@endsection