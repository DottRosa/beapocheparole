<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="index.html">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                  <img src="assets/static/images/logo.png" alt="">
                </div>
              </div>
              <div class="peer peer-greed">
                <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r">
      <li class="nav-item mT-30 active">
        <a class="sidebar-link" href="{{url('admin/')}}">
          <span class="icon-holder">
            <i class="fas fa-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{url('admin/galleries')}}">
          <span class="icon-holder">
            <i class="fas fa-images"></i>
          </span>
          <span class="title">Gallerie</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{url('admin/images')}}">
          <span class="icon-holder">
            <i class="far fa-image"></i>
          </span>
          <span class="title">Immagini</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{url('admin/texts')}}">
          <span class="icon-holder">
            <i class="far fa-file-alt"></i>
          </span>
          <span class="title">Testi</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="fas fa-cogs"></i>
            </span>
          <span class="title">Gestione</span>
          <span class="arrow">
              <i class="fas fa-caret-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{url('admin/users')}}">Utenti</a>
          </li>
          <li>
            <a href="{{url('admin/logs')}}">Logs</a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class='sidebar-link' href="compose.html">
          <span class="icon-holder">
            <i class="fas fa-chart-bar"></i>
          </span>
          <span class="title">Statistiche</span>
        </a>
      </li>


      <li class="nav-item">
        <a class='sidebar-link' href="{{url('home')}}">
          <span class="icon-holder">
            <i class="fas fa-external-link-alt"></i>
          </span>
          <span class="title">Vai al sito</span>
        </a>
      </li>


      <li class="nav-item">
        <a class='sidebar-link' href="{{url('admin/logout')}}">
          <span class="icon-holder">
            <i class="fas fa-sign-out-alt"></i>
          </span>
          <span class="title">Logout</span>
        </a>
      </li>



    </ul>
  </div>
</div>
