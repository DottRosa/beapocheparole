<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="{{url('admin/dashboard')}}">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo"></div>
              </div>
              <div class="peer peer-greed">
                <h5 class="lh-1 mB-0 logo-text"><span style="color:#2196f3 ;">Bea</span>ckend</h5>
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
      <li class="nav-item mT-30 @if(ends_with(Request::path(), 'admin') || ends_with(Request::path(), 'dashboard')) active @endif">
        <a class="sidebar-link" href="{{url('admin/')}}">
          <span class="icon-holder">
            <i class="fas fa-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item @if(ends_with(Request::path(), 'admin/galleries/list')) active @endif">
        <a class='sidebar-link' href="{{url('admin/galleries/list')}}">
          <span class="icon-holder">
            <i class="fas fa-images"></i>
          </span>
          <span class="title">Gallerie</span>
        </a>
      </li>

      <li class="nav-item dropdown @if(ends_with(Request::path(), 'admin/images/list') || ends_with(Request::path(), 'admin/documents/list') || ends_with(Request::path(), 'admin/tags')) open @endif">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="far fa-image"></i>
            </span>
          <span class="title">Contenuti</span>
          <span class="arrow">
              <i class="fas fa-caret-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li class="@if(ends_with(Request::path(), 'admin/images/list')) active @endif">
            <a href="{{url('admin/images/list')}}">Immagini</a>
          </li>
          <li class="@if(ends_with(Request::path(), 'admin/documents/list')) active @endif">
            <a href="{{url('admin/documents/list')}}">Testi</a>
          </li>
          <li class="@if(ends_with(Request::path(), 'admin/tags')) active @endif">
            <a href="{{url('admin/tags')}}">Tag</a>
          </li>
        </ul>
      </li>

      @if(Session::get('admin')->permission == 'ADMIN')
      <li class="nav-item dropdown @if(ends_with(Request::path(), 'admin/users') || ends_with(Request::path(), 'admin/logs')) open @endif">
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
          <li class="@if(ends_with(Request::path(), 'admin/users')) active @endif">
            <a href="{{url('admin/users')}}">Utenti</a>
          </li>
          <li class="@if(ends_with(Request::path(), 'admin/logs')) active @endif">
            <a href="{{url('admin/logs')}}">Logs</a>
          </li>
          <li class="@if(ends_with(Request::path(), 'admin/errors')) active @endif">
            <a href="{{url('admin/errors')}}">Errori</a>
          </li>
        </ul>
      </li>
      @endif


      <li class="nav-item">
        <a class='sidebar-link' href="compose.html">
          <span class="icon-holder">
            <i class="fas fa-chart-bar"></i>
          </span>
          <span class="title">Statistiche</span>
        </a>
      </li>


      <li class="nav-item">
        <a class='sidebar-link' href="{{url('/immagini')}}" target="_blank">
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
