<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('asset/backend/css/style.default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/backend/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/jquery.tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/toggles.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/style.datatables.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('asset/backend/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/backend/css/deleteModal.css')}}" rel="stylesheet">


    <link href="{{ asset('asset/backend/css/custom.css') }}" rel="stylesheet">
   

</head>

<body>
    <div id="loader" style="display: none"></div>

    {{-- @if (isAdmin())
        @include('backend.include.header_admin')
    @endif
    @if (isUser())
        @include('backend.include.header_union')
    @endif --}}
    @include('Backend.Include.Header')

    <section>
        <div class="mainwrapper">
            {{-- @if (isAdmin())
                @include('backend.include.sidebar_admin')
            @endif
            @if (isUser())
                @include('backend.include.sidebar_union')
            @endif --}}
            @include('Backend.Include.Sidebar')

            @yield('content')
        </div><!-- mainwrapper -->
    </section>
    @include('Backend.Include.Footer')
    
</body>

</html>
