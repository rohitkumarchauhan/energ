@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                            class="icon-home"></i>
                    Home</a></div>

            @include('layouts.flash_message')
            <h1>Administer Database Backups</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Create New Backup</h5>
                            <div class="pull-right">


                                <a id="create-new-backup-button" href="{{ url('admin/backup/create') }}"
                                   class="btn btn-primary pull-right"
                                   style="margin-bottom:2em;"><i
                                            class="fa fa-plus"></i> Create New Backup
                                </a>

                            </div>

                        </div>


                        <div class="widget-content nopadding">
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Size</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($backups as $backup)

                                    <tr>
                                        <td>{{ $backup['file_name'] }}</td>
                                        <td>{{ $backup['file_size']}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-default"
                                               href="{{ url('admin/backup/download/'.$backup['file_name']) }}"><i
                                                        class="fa fa-cloud-download"></i> Download</a>
                                            <a class="btn btn-xs btn-danger" data-button-type="delete"
                                               href="{{ route('delete-backup',$backup['file_name']) }}"><i
                                                        class="fa fa-trash-o"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection