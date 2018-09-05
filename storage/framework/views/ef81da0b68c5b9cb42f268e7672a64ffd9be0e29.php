<?php $__env->startSection('pageCss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/extra-libs/multicheck/multicheck.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJs'); ?>
    <script src="<?php echo e(asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/multicheck/jquery.multicheck.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pages</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="mdi mdi-home"></i></a></li>
                           
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

                            <a href="<?php echo e(route('pages.create')); ?>" class="btn btn-success pull-right">Add</a>
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



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dataTable').DataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
               // "sDom": '<""l>t<"F"fp>',
                "pageLength": 10,
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(route('pages.ajax')); ?>',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],

            });
        });
    </script>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.adminLayout.admin_design', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>