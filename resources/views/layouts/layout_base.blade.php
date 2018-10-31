<!DOCTYPE html>
<html lang="en">
    <head>
    @include('_head')
    @include('_tracker')
    </head>

    <body class="animated fadeIn @yield('body-class')">
        @include('_header')

        @include('_menu')

        <main id="@yield('page-id')" class="@if(!ends_with(Request::path(), '/')) spacer @endif">

            

            @section('content')
            @show
        </main>

        @include('_footer')

        @include('_script')

        @section('javascript')
        @show
    </body>
</html>
