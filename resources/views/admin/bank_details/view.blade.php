@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a> <a href="{{ route('categories.index')}}">{{ $title }}</a> <a href="#"
                                                                                          class="current">View</a>
            </div>
            @include('layouts.flash_message')
            <h1>View :{{ $category->title }}</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5> {{  $category->title }}</h5>
                            <div class="pull-right">
                                <a href="{{route('subcategories.create',$category->id)}}" title="Add SubCategory"
                                   class="btn btn-success">Add SubCategory</a>
                                @if($category->type_id==\App\Category::TYPE_CUSTOME_GARMENTS)
                                    <a href="{{route('categories.index')}}" title="Back"
                                       class="btn btn-default">Back</a>

                                @else


                                    <a href="{{ route('categories.categoryIndex',['type'=>$category->type_id])}}"
                                       class="btn btn-default">Back</a>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>

                <div class="widget-content nopadding">
                    <table id="w0" class="table table-striped table-bordered detail-view">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $category->title }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td> @if(!empty($file))
                                    <img src="{!!  $file->getImageAbsolutePath($file)  !!}" width="200px"
                                         height="200px">

                                @endif

                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>View Sub Categories</h5>


                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dataTable').DataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "sDom": '<""l>t<"F"fp>',
                "pageLength": 10,
                processing: true,
                serverSide: true,
                ajax: '{{ route('subcategories.ajax',$category->id) }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
