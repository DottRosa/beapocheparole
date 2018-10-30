<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('admin._head')

    <title>Dashboard</title>


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
                <div class="row gap-20">
                  <!-- #Toatl Visits ==================== -->
                  <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total Visits</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- #Total Page Views ==================== -->
                  <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Immagini</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash2"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- #Unique Visitors ==================== -->
                  <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Testi</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash3"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- #Bounce Rate ==================== -->
                  <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Tag</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash4"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-12">
                <!-- #Site Visits ==================== -->
                <div class="bd bgc-white">
                  <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                      <div class="layers">
                        <div class="layer w-100 mB-10">
                          <h6 class="lh-1">Gallerie</h6>
                        </div>
                        <div class="layer w-100">
                          <div id="world-map-marker"></div>
                        </div>
                      </div>
                    </div>
                    <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                      <div class="layers">
                        <div class="layer w-100">
                          <!-- Progress Bars -->
                          <div class="layers">
                            <div class="layer w-100">
                              <h5 class="mB-5">100k</h5>
                              <small class="fw-600 c-grey-700">Visitors From USA</small>
                              <span class="pull-right c-grey-600 fsz-sm">50%</span>
                              <div class="progress mT-10">
                                <div class="progress-bar bgc-deep-purple-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span></div>
                              </div>
                            </div>
                            <div class="layer w-100 mT-15">
                              <h5 class="mB-5">1M</h5>
                              <small class="fw-600 c-grey-700">Visitors From Europe</small>
                              <span class="pull-right c-grey-600 fsz-sm">80%</span>
                              <div class="progress mT-10">
                                <div class="progress-bar bgc-green-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span></div>
                              </div>
                            </div>
                            <div class="layer w-100 mT-15">
                              <h5 class="mB-5">450k</h5>
                              <small class="fw-600 c-grey-700">Visitors From Australia</small>
                              <span class="pull-right c-grey-600 fsz-sm">40%</span>
                              <div class="progress mT-10">
                                <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span></div>
                              </div>
                            </div>
                            <div class="layer w-100 mT-15">
                              <h5 class="mB-5">1B</h5>
                              <small class="fw-600 c-grey-700">Visitors From India</small>
                              <span class="pull-right c-grey-600 fsz-sm">90%</span>
                              <div class="progress mT-10">
                                <div class="progress-bar bgc-blue-grey-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">90% Complete</span></div>
                              </div>
                            </div>
                          </div>

                          <!-- Pie Charts -->
                          <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                            <div class="peer">
                              <div class="easy-pie-chart" data-size='80' data-percent="75" data-bar-color='#f44336'>
                                <span></span>
                              </div>
                              <h6 class="fsz-sm">New Users</h6>
                            </div>
                            <div class="peer">
                              <div class="easy-pie-chart" data-size='80' data-percent="50" data-bar-color='#2196f3'>
                                <span></span>
                              </div>
                              <h6 class="fsz-sm">New Purchases</h6>
                            </div>
                            <div class="peer">
                              <div class="easy-pie-chart" data-size='80' data-percent="90" data-bar-color='#ff9800'>
                                <span></span>
                              </div>
                              <h6 class="fsz-sm">Bounce Rate</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-item col-md-6">
                <!-- #Monthly Stats ==================== -->
                <div class="bd bgc-white">
                  <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                      <h6 class="lh-1">Monthly Stats</h6>
                    </div>
                    <div class="layer w-100 p-20">
                      <canvas id="line-chart" height="220"></canvas>
                    </div>
                    <div class="layer bdT p-20 w-100">
                      <div class="peers ai-c jc-c gapX-20">
                        <div class="peer">
                          <span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span>
                          <small class="c-grey-500 fw-600">APPL</small>
                        </div>
                        <div class="peer fw-600">
                          <span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span>
                          <small class="c-grey-500 fw-600">Average</small>
                        </div>
                        <div class="peer fw-600">
                          <span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span>
                          <small class="c-grey-500 fw-600">Sales</small>
                        </div>
                        <div class="peer fw-600">
                          <span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span>
                          <small class="c-grey-500 fw-600">Profit</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
      </div>
    </div>

    @include('admin._script')
  </body>
</html>
