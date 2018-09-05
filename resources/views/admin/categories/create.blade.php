@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a>

                @if(!empty($type))
                    <a href="{{ route('categories.categoryIndex',['type'=>$type])}}">Garments</a>
                @else
                    <a href="{{ route('categories.index')}}">Garments</a>
                @endif


                <a href="#" class="current">Add
                    Category</a>
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
                                @if(!empty($type))
                                    <a href="{{ route('categories.categoryIndex',['type'=>$type])}}"
                                       class="btn btn-default">Back</a>
                                @else
                                    <a href="{{route('categories.index')}}" class="btn btn-default">Back</a>
                                @endif
                            </div>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal garment_form_outer" method="post"
                                  action="{{ route('categories.store') }}"
                                  name="add_category" id="add_category" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input name="title" type="text" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="multifileselect"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Position</label>
                                    <div class="controls">
                                        <input type="text" name="position" class="multifileselect"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="editor">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                @php

                                        @endphp
                                @if(!empty($type))
                                    <div class="control-group">
                                        <label class="control-label">Role</label>
                                        <div class="controls">
                                            <select name="type_id" style="width: 220px;" id="role_id">
                                                <option value="0">Select Role</option>
                                                @foreach(\App\Category::getType() as $key =>$val)
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>@endif

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
