<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'supply chain') }}</title>

    {{--<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}"/>--}}
    <link rel="stylesheet" href="{{ asset('assets/libs/flot/css/float-chart.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/back/admin-custom.css') }}"/>
    @yield('pageCss')

{{--    <link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}"/>--}}

</head>
<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">

@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')
    <div class="page-wrapper">
        @include('flash::message')
        @yield('content')

        @include('layouts.adminLayout.admin_footer')
    </div>
</div>

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
<script src="{{ asset('dist/js/waves.js') }}"></script>
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('dist/js/custom.min.js') }}"></script>

{{--<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>--}}

@yield('pageJs')

<script>

    $(document).on('click', 'a[id^=remove_image-]', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });
        var id = $(this).attr('data-id');

        if (confirm('Are you sure you want to Delete this Image')) {
            $.ajax({
                url: '{{ route('media.delete-image') }}',
                type: 'POST',
                data: {
                    id: id,
                },
            }).done(function (response) {

                window.location.reload();
            });

        }
    });


    $(document).on('click', '.delete-model', function (e) {

        if (!confirm('Are you sure you want to Delete this')) {
            e.preventDefault();
        }


    });

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);


</script>


@yield('scripts')

</body>
</html>
