<header class="col-xs-12">
    <div id="header-menu">
        <h4 class="pull-left">
            <a href="{{url('/')}}" class="bpp-regular">
                Beatrice<br />Basaldella
            </a>
        </h4>

        <ul class="pull-right animated fadeInDown">
            <li class="hover-red @if(ends_with(Request::path(), '/')) active @endif">
                <a href="{{url('/')}}">
                    <img class="svg svg-baseline" src="{{url('dist/images/icons/ic_BB.svg')}}" />
                </a>
                <span class="link-name">Homepage</span>
            </li>
            <li class="hover-blue @if(ends_with(Request::path(), 'immagini')) active @endif">
                <a href="{{url('/immagini')}}">
                    <img class="svg svg-baseline" src="{{url('dist/images/icons/ic_tripod.svg')}}" />
                </a>
                <span class="link-name">Immagini</span>
            </li>
            <li class="hover-green @if(ends_with(Request::path(), 'testi')) active @endif">
                <a href="{{url('/testi')}}">
                    <img class="svg svg-baseline" src="{{url('dist/images/icons/ic_pen.svg')}}" />
                </a>
                <span class="link-name">Testi</span>
            </li>
            <li class="hover-magenta @if(ends_with(Request::path(), 'gallerie')) active @endif">
                <a href="{{url('/gallerie')}}">
                    <img class="svg svg-baseline" src="{{url('dist/images/icons/ic_gallery.svg')}}" />
                </a>
                <span class="link-name">Gallerie</span>
            </li>
        </ul>
    </div>


</header>
