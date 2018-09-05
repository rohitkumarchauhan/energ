@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a>

                <a href="{{ route('bank_details.index')}}">{{ $title }}</a>
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
                                <a href="{{route('bank_details.create')}}"
                                   class="btn btn-success">Add</a>
                            </div>

                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Account No</th>
                                    <th>Bank Name</th>
                                    <th>Address</th>
                                    <th>SWIFT Code</th>
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
                ajax: '{{ route('bank_details.ajax') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'account_no', name: 'account_no'},
                    {data: 'bank_name', name: 'bank_name'},
                    {data: 'address', name: 'address'},
                    {data: 'code', name: 'code'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection






