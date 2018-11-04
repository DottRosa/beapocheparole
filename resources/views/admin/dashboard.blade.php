<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('admin._head')

    <title>Dashboard</title>

    <style>
        .svg{
            width:150px;
            margin: auto;
            display: block;
            margin-top:15px;
        }
    </style>


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
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item  w-100">
                  <div class="col-xs-12 text-center" style="margin-bottom:50px;">
                      <h1 class="lh-1 mB-0 logo-text" style="font-size:40px;"><span style="color:#2196f3 ;">Bea</span>ckend</h1>
                  </div>
                <div class="row gap-20">
                  <!-- #Toatl Visits ==================== -->
                  <a class='col-md-6' href="{{url('admin/images/list')}}">
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h3 class="lh-1 text-center">Immagini</h3>
                        <img class="svg" src="{{url('public/dist/images/icons/ic_tripod.svg')}}" />
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>

                  <!-- #Total Page Views ==================== -->
                  <a class='col-md-6' href="{{url('admin/documents/list')}}">
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h3 class="lh-1 text-center">Testi</h3>
                        <img class="svg" src="{{url('public/dist/images/icons/ic_pen.svg')}}" />
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash2"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>

                  <!-- #Unique Visitors ==================== -->
                  <a class='col-md-6' href="{{url('admin/tags')}}">
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h3 class="lh-1 text-center">Tag</h3>
                        <img class="svg" src="{{url('public/dist/images/icons/ic_gallery.svg')}}" />
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash3"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>

                  <!-- #Bounce Rate ==================== -->
                  <a class='col-md-6' href="{{url('admin/galleries/list')}}">
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h3 class="lh-1 text-center">Gallerie</h3>
                        <img class="svg" src="{{url('public/dist/images/icons/ic_gallery.svg')}}" />
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash4"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>
                </div>

              </div>





            </div>
          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        @include('admin._footer')
      </div>
    </div>

    @include('admin._script')
  </body>
</html>
