@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a> <a href="{{ route('liningmaterial.index')}}">{{ $title }}</a> <a href="#"
                                                                                               class="current">Edit</a>
            </div>
            <h1>{{ $lining->title }}</h1>
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
                            <h5>Edit {{ $lining->title }}</h5>


                            <div class="pull-right">
                                <a href="{{route('liningmaterial.index')}}" title="Back"
                                   class="btn btn-default">Back</a>


                            </div>
                        </div>
                        <div class="widget-content ">
                            <form class="form-horizontal garment_form_outer" method="POST"
                                  action="{{ route('liningmaterial.update',$lining->id) }}"
                                  name="edit_fabrics" id="edit_fabrics" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input name="title" value="{{ $lining->title }}" type="text">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Fabric</label>
                                    <div class="controls">
                                        <select name="fabric_id" style="width: 220px;" id="role_id">
                                            <option value="0">Select Fabric</option>
                                            @foreach($lining->getFabric() as $key =>$val)
                                                <option value="{{ $val->id }}" {{($val->id==$lining->fabric_id)?"selected":''}} >{{ $val->title }} ({{$val->ctitle}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="multifileselect-edit"/>
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









