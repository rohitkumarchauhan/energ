@extends('layouts.adminLayout.admin_design')
@section('pageCss')

@endsection
@section('pageJs')

    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>

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
                });

                CKEDITOR.replace('editor');
            });
        });
    </script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pages</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/pages') }}">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
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
                <div class="card col-md-12">
                    <form class="form-horizontal garment_form_outer" method="post"
                          action="{{ route('pages.update',$page->id) }}"
                          name="add_products" id="add_role" novalidate="novalidate"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Title</label>
                                <div class="col-sm-5">
                                    <input type="text" name="title" class="form-control" placeholder="" value="{{ $page->title }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 text-right control-label col-form-label">Type</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="type_id" required>
                                        @foreach($page->getType() as $key=>$val)
                                            <option value="{{ $key }}" @if($page->type_id==$key) selected @endif>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="editor" required>{{ $page->description }}</textarea>
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

