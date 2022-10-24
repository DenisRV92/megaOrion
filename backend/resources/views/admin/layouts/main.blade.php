<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/47fa64768d.js" crossorigin="anonymous"></script>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('js/plugins/toastr/toastr.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

        @include('admin.includes.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2022-{{ date('Y') }}
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/admin/app.js') }}"></script>

@if(session('alerts'))
    <script>
        $(document).ready(function() {
            @foreach(session('alerts') as $key => $text)
                toastr.{{$key}}("{!! $text !!}");
            @endforeach
        });

    </script>
@endif

</body>
</html>
