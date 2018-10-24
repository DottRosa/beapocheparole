@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'home')

@section('content')

@php
$first_name = 'Beatrice';
$last_name = 'Basaldella';
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
    function smoothScroll(eID) {
        var startY = currentYPosition();
        var stopY = elmYPosition(eID);
        var distance = stopY > startY ? stopY - startY : startY - stopY;
        var speed = (ANIMATION_MUTLIPLICATOR * ANIMATION_DURATION)/1000;
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

</script>
@endsection
