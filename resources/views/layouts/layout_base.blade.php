<!DOCTYPE html>
<html lang="en">
    <head>
    @include('_head')
    @include('_tracker')
    </head>

    <body class="animated fadeIn">
        @include('_header')

        @include('_menu')

        <main id="@yield('page-id')" class="@if(!ends_with(Request::path(), '/')) spacer @endif">

            @if(ends_with(Request::path(), 'immagini'))
                @include('_filters', ['page' => 'immagini'])
            @endif
            @if(ends_with(Request::path(), 'testi'))
                @include('_filters', ['page' => 'testi'])
            @endif

            @section('content')
            @show
        </main>

        @include('_footer')

        @include('_script')

        @section('javascript')
        @show
    </body>
</html>
