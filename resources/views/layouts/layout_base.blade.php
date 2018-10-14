<!DOCTYPE html>
<html lang="en">
    <head>
    @include('_head')
    </head>

    <body>
        <div class="col-sm-1">
            @include('_menu')
        </div>

        <main id="@yield('page-id')" class="col-md-11">
            @section('content')
            @show
        </main>

        @include('_footer')

        @include('_script')

        @section('javascript')
        @show
    </body>
</html>
