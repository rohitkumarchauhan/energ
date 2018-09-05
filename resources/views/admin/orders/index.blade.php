@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a>

                <a href="{{ route('lining_colour.index')}}">{{ $title }}</a>
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
                                <a href="{{route('lining_colour.create')}}"
                                   class="btn btn-success">Add</a>
                            </div>

                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
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
                ajax: '{{ route('orders.ajax') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'garments.title', name: 'garments.title'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection






