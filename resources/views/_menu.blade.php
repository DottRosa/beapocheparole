<div id="menu-container">
    <h4>
        <a href="{{url('/')}}">
            Beatrice<br />Basaldella
        </a>
    </h4>
    <nav id="menu" class="animated fadeInLeft">
        <ul>
            <li class="hover-red">
                <a href="{{url('/')}}">
                    <!-- <i class="fas fa-home"></i> -->
                    <img class="svg" src="{{url('public/dist/images/icons/ic_BB.svg')}}" />
                </a>
                <span class="link-name">Homepage</span>
            </li>
            <li class="hover-blue @if(ends_with(Request::path(), 'immagini')) active @endif">
                <a href="{{url('/immagini')}}">
                    <img class="svg" src="{{url('public/dist/images/icons/ic_tripod.svg')}}" />
                </a>
                <span class="link-name">Immagini</span>
            </li>
            <li class="hover-green @if(ends_with(Request::path(), 'testi')) active @endif">
                <a href="{{url('/testi')}}">
                    <img class="svg" src="{{url('public/dist/images/icons/ic_pen.svg')}}" />
                </a>
                <span class="link-name">Testi</span>
            </li>
            <li class="hover-magenta @if(ends_with(Request::path(), 'gallerie')) active @endif">
                <a href="{{url('/gallerie')}}">
                    <img class="svg" src="{{url('public/dist/images/icons/ic_gallery.svg')}}" />
                </a>
                <span class="link-name">Gallerie</span>
            </li>
        </ul>
    </nav>

    <footer>
        <small><a href="{{url('privacy')}}">Privacy policy</a></small>
        <small><a href="{{url('cookies')}}">Cookies</a></small>
    </footer>
</div>
