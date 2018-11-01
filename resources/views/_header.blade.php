<header class="col-xs-12">
    

    <div class="col-sm-8 col-xs-9 animated fadeInDown">
        <ul id="header-menu">
            <li class="hover-red @if(ends_with(Request::path(), '/')) active @endif">
                <a href="{{url('/')}}">
                    <i class="fas fa-home"></i>
                </a>
                <span class="link-name">Homepage</span>
            </li>
            <li class="hover-blue @if(ends_with(Request::path(), 'immagini')) active @endif">
                <a href="{{url('/immagini')}}">
                    <i class="far fa-image"></i>
                </a>
                <span class="link-name">Immagini</span>
            </li>
            <li class="hover-green @if(ends_with(Request::path(), 'testi')) active @endif">
                <a href="{{url('/testi')}}">
                    <i class="fas fa-pen"></i>
                </a>
                <span class="link-name">Testi</span>
            </li>
            <li class="hover-magenta @if(ends_with(Request::path(), 'gallerie')) active @endif">
                <a href="{{url('/gallerie')}}">
                    <i class="far fa-clone"></i>
                </a>
                <span class="link-name">Gallerie</span>
            </li>
            <li class="hover-red @if(ends_with(Request::path(), 'chi-sono')) active @endif">
                <a href="{{url('/')}}">
                    <i class="far fa-user"></i>
                </a>
                <span class="link-name">Chi sono</span>
            </li>
        </ul>
    </div>


</header>
