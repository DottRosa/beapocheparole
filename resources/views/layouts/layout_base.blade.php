<!DOCTYPE html>
<html lang="en">
    <head>
    @include('_head')
    </head>

    <body class="animated fadeIn">
        @include('_header')

        @include('_menu')

        <main id="@yield('page-id')" class="@if(!ends_with(Request::path(), '/')) container spacer @endif">
            @section('content')
            @show
        </main>

        @include('_footer')

        @include('_script')

        @section('javascript')
        @show
    </body>
</html>
