@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a>
                @if(!empty($type))
                    <a href="{{ route('categories.categoryIndex',['type'=>$type])}}">{{ $title }}</a>
                @else
                    <a href="{{ route('categories.index')}}">{{ $title }}</a>
                @endif
                <a href="#" class="current">Index</a>
            </div>
            @include('layouts.flash_message')
            <h1>{{ $title }}</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>View {{ $title }}</h5>
                            <div class="pull-right">

                                @if(!empty($type))

                                    <a href="{{route('categories.create.type',['type'=>$type])}}"
                                       class="btn btn-success">Add</a>

                                @else
                                    <a href="{{route('categories.create')}}" class="btn btn-success">Add</a>

                                @endif
                            </div>

                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
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
                @if(!empty($type))
                ajax: '{{ route('categories.typeajax',['type'=>$type]) }}',
                @else
                ajax: '{{ route('categories.ajax') }}',

                @endif

                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection






