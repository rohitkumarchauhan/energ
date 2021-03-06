@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a> <a href="{{ route('categories.index')}}">Categories</a> <a href="#"
                                                                                        class="current">Edit</a>
            </div>
            <h1>Users</h1>
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php $errors = json_decode(session('error'));?>
                    @foreach( $errors as  $key=>$error)
                        <strong>{{ $error[0] }}</strong><br/>
                    @endforeach
                </div>
            @endif

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Category</h5>
                            <div class="pull-right">
                                <a href="{{route('categories.index')}}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <div class="widget-content ">
                            <form class="form-horizontal garment_form_outer" method="POST"
                                  action="{{ route('subcategories.update',$subcategory->id) }}"
                                  name="add_category" id="add_category" novalidate="novalidate"
                                  enctype="multipart/form-data"> {{ csrf_field() }}
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input name="title" type="text" value="{{ $subcategory->title }}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="multifileselect-edit"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description"
                                                  id="editor">{{ $subcategory->description }}</textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="category_id" id="category_id"
                                       value="{{ $subcategory->category_id  }}"/>
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
        $(document).ready(function () {


            $('.multifileselect-edit').fileinput({

                initialPreview: [
                    @foreach($systemfiles as $file)

                        '<img src="{{ $file->getImageAbsolutePath($file) }}" class="file-preview-image" alt="Desert" title="Desert">'

                    @endforeach
                ],
            });
        });

    </script>
@endsection







