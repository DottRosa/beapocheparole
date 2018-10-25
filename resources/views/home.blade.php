@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'home')

@section('content')

@php
$hide = true;

if($hide){
    $first_name = 'Prova';
    $last_name = 'Delle Prove';
} else {
    $first_name = 'Beatrice';
    $last_name = 'Basaldella';
}


@endphp


<h1 class="home-title" id="home-title-1">
    {{$first_name}}
</h1>

<div class="home-title" id="home-title-3">
    <h1>
        {{$first_name}}
    </h1>
    <h1>
        {{$last_name}}
    </h1>
    <h4 class="text-center">Pittrice, fotografa, scrittrice</h4>

    <i class="fas fa-angle-down" id="angle-down"></i>
</div>


<div id="box-1" class="full-box">

</div>

<div id="box-2" class="full-box">
    <h1 class="" id="home-title-2">
        {{$last_name}}
    </h1>
</div>

<div id="box-3" class="full-box">

</div>

<div id="box-4" class="full-box">
    <div class="main spacer">
        <div class="col-sm-8">
            <h1>Chi sono</h1>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas semper ex sed augue suscipit finibus. Aenean consectetur maximus dui ac faucibus. Nam porta fringilla mattis. Praesent quis ipsum enim. Donec laoreet, massa at rutrum posuere, lacus tortor eleifend velit, in posuere justo ligula vitae odio. Pellentesque commodo est mauris, rutrum consequat velit viverra ac. Mauris vestibulum risus urna, eget finibus turpis posuere non. Nullam at placerat odio. Mauris a pulvinar urna, eget interdum urna. Vestibulum eu elit semper, imperdiet massa ut, rutrum est. Mauris eleifend molestie facilisis. Mauris fermentum interdum lacus, at mattis justo.

                Sed id interdum nunc, ut ornare arcu. Pellentesque a nulla nec magna rhoncus pellentesque. Curabitur cursus ullamcorper blandit. Etiam quis felis vel metus tincidunt faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque sagittis, diam eu vulputate rhoncus, ex mauris vulputate ligula, quis semper mauris nulla nec tortor. Suspendisse lacus sapien, vestibulum ac sem eu, pretium tincidunt risus. Vivamus eu ligula id tortor consectetur vulputate. In scelerisque ac lacus eu luctus. Vestibulum non neque aliquet, faucibus urna et, pellentesque libero.

                Nulla aliquet erat sit amet mi tristique maximus. Cras dictum dapibus dolor, posuere egestas nulla blandit id. Suspendisse potenti. Aliquam facilisis eu urna vitae pretium. Fusce blandit arcu sed urna tempus, at tempus neque consectetur. In auctor porttitor ligula et vehicula. Duis aliquam nunc tellus, et pellentesque tortor vestibulum non. In hac habitasse platea dictumst.

                Maecenas in egestas felis. Nam faucibus ut leo sit amet faucibus. Vivamus risus dui, lobortis sed risus mollis, molestie lobortis libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam luctus tempus elit et eleifend. Mauris dapibus et orci ac rhoncus. Phasellus ac risus eros. Praesent pellentesque diam at ipsum venenatis vestibulum.

                Nullam volutpat lacus nisi, ac commodo metus suscipit eu. Pellentesque laoreet condimentum mi. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fermentum dapibus ligula, ut ultrices erat imperdiet ut. Quisque tempor purus vel ante feugiat interdum. Integer ac felis mi. Duis nisl metus, molestie id consectetur nec, egestas ut neque. Suspendisse potenti. Cras finibus dignissim augue, non sodales enim condimentum at. Phasellus et massa euismod, suscipit lectus sit amet, condimentum ex. Nulla facilisi.
            </p>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>

<div id="box-5" class="full-box">
    <div id="contact-form-container">
        <div class="col-xs-12 bg-primary contact-form-header">
            <h3>Contattami</h3>
        </div>
        <div class="col-sm-4">
            <i class="far fa-5x fa-envelope"></i>
        </div>
        <div class="col-sm-8 text-left">
            <form>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Messaggio</label>
                    <textarea class="form-control" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> Invia email</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


@section('javascript')
<script>
    //Costanti per l'animazione
    const ANIMATION_TIMEOUT         = 1500; //Tempo di attesa prima dell'inizio dell'animazione
    const ANIMATION_DURATION        = 5000; //Durata dell'animazione
    const ANIMATION_MUTLIPLICATOR   = 0.6;  //Moltiplicatore per la velocità dell'animazione
    const ANIMATION_STEP            = 1;    //Pixel di avanzata dello scroll
    const ANIMATION_ACTIVATE        = false; //Attiva e disattiva lo scroll automatico

    //Elementi
    const BOX_1     = 'box-1';
    const BOX_2     = 'box-2';
    const BOX_3     = 'box-3';
    const BOX_4     = 'box-4';
    const BOX_5     = 'box-5';
    const TITLE_1   = 'home-title-1';
    const TITLE_2   = 'home-title-2';
    const TITLE_3   = 'home-title-3';

    //Posizione di partenza del secondo titolo.
    //(Metà dell'altezza del primo box + metà altezza del primo titolo)*-1
    const TITLE_2_START_POSITION = -($('#'+BOX_1).outerHeight()/2 + $('#'+TITLE_1).outerHeight()/2);

    $(document).ready(function(){
        $('#'+TITLE_2).css('top', TITLE_2_START_POSITION+"px");

        if(ANIMATION_ACTIVATE){
            setTimeout(function(){
                smoothScroll(BOX_3);    /* TODO animazione ease */
            }, ANIMATION_TIMEOUT);
        };

    });

    function currentYPosition() {
        // Firefox, Chrome, Opera, Safari
        if (self.pageYOffset) return self.pageYOffset;
        // Internet Explorer 6 - standards mode
        if (document.documentElement && document.documentElement.scrollTop)
            return document.documentElement.scrollTop;
        // Internet Explorer 6, 7 and 8
        if (document.body.scrollTop) return document.body.scrollTop;
        return 0;
    }

    function elmYPosition(eID) {
        var elm = document.getElementById(eID);
        var y = elm.offsetTop;
        var node = elm;
        while (node.offsetParent && node.offsetParent != document.body) {
            node = node.offsetParent;
            y += node.offsetTop;
        } return y;
    }

    /*
    Esegue uno scroll con animazione fino ad un dato elemento
    @params eID l'id dell'elemento al quale deve arrivare lo scroll
    */
    function smoothScroll(eID, timing) {
        var startY = currentYPosition();
        var stopY = elmYPosition(eID);
        var distance = stopY > startY ? stopY - startY : startY - stopY;

        if(timing === undefined){
            timing = ANIMATION_DURATION;
        }

        var speed = (ANIMATION_MUTLIPLICATOR * timing)/1000;
        var step = ANIMATION_STEP;
        var leapY = stopY > startY ? startY + step : startY - step;
        var timer = 0;
        if (stopY > startY) {
            for ( var i=startY; i<stopY; i+=step ) {
                setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                leapY += step; if (leapY > stopY) leapY = stopY; timer++;
            }
            return;
        } else {

        }
        for ( var i=startY; i>stopY; i-=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
        }
    }

    //In base allo scroll mostro/nascondo scritte
    $(document).scroll(function(){
        if(existsById(BOX_1) && !isInViewport($('#'+BOX_1))){
            $('#'+TITLE_1).remove();    //Rimuovo beatrice
            $('#'+TITLE_3).show();      //Mostro nome e cognome
            center($('#'+TITLE_3));     //Centro nome e cognome
        }

        if(existsById(BOX_1) && existsById(BOX_2) && !isInViewport($('#'+BOX_1)) && !isInViewport($('#'+BOX_2))){
            $('#'+BOX_1).remove();
            $('#'+BOX_2).remove();
        }

        if(existsById(BOX_2) && isInViewport($('#'+BOX_2))){
            let topValue = TITLE_2_START_POSITION + $(window).scrollTop();
            $('#'+TITLE_2).css({ top: topValue });
        }
    });


    $('#angle-down').click(function(){
        smoothScroll(BOX_4, 2000);
    });


    /* TODO Quando premo invia email il box si sposta con dissolvenza a destra e sotto rimane un nuovo box vuoto */

</script>
@endsection
