<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin._head')
    </head>

    <body class="app">
        <div id='loader'>
          <div class="spinner"></div>
        </div>

        <script>
          window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
              loader.classList.add('fadeOut');
            }, 300);
          });
        </script>

      <!-- @App Content -->
      <!-- =================================================== -->
      <div>
        <!-- #Left Sidebar ==================== -->
        @include('admin._menu')

        <!-- #Main ============================ -->
        <div class="page-container">

          @include('admin._header')

          <!-- ### $App Screen Content ### -->
          <main class='main-content bgc-grey-100' id="@yield('page-id')">
            <div id='mainContent'>
                  @section('content')
                  @show
              </div>
            </div>
          </main>

          <!-- ### $App Screen Footer ### -->
          @include('admin._footer')
        </div>
      </div>

      @include('admin._script')

      @section('javascript')
      @show
    </body>
</html>
