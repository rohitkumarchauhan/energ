@extends('layouts.adminLayout.admin_design')
@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"/>
@endsection
@section('pageJs')
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
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
                           {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ route('pages.index')}}">Pages</a> </li>--}}
                            <li class="breadcrumb-item active" aria-current="page">Pages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">

                            <a href="{{route('pages.create')}}" class="btn btn-success pull-right">Add</a>
                        </div>



                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
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
               // "sDom": '<""l>t<"F"fp>',
                "pageLength": 10,
                processing: true,
                serverSide: true,
                ajax: '{{ route('pages.ajax') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],

            });
        });
    </script>
@endsection






