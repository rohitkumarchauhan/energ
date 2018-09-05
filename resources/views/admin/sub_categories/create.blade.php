@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a> <a href="{{ route('categories.index')}}">Sub Categories</a> <a href="#" class="current">Add
                    Sub Categories</a>
            </div>
            <h1>Categories</h1>
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
                            <h5>Add Sub Category</h5>
                            <div class="pull-right">
                                <a href="{{route('categories.index')}}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <div class="widget-content ">
                            <form class="form-horizontal garment_form_outer" method="post"
                                  action="{{ route('subcategories.store') }}"
                                  name="add_sub_category" id="add_sub_category" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input name="title" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="file-uploader"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="editor"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="category_id" id="category_id" value="{{ $id  }}"/>


                                {{--<div id="attribute-choices">--}}
                                    {{--<div class="control-group">--}}
                                        {{--<label class="control-label">Grament Options</label>--}}
                                        {{--<div class="controls">--}}
                                            {{--<select name="status" style="width: 220px;" id="status" multiple="true">--}}
                                                {{--@foreach($desgin_options as $garment_option )--}}
                                                    {{--<option value="{{ $garment_option->id }}">{{ $garment_option->title }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

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
//
//    $('#file-uploader').fileinput({
//       multiple:true
//    });

        });

    </script>
@endsection
