@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'home')

@section('content')


<h1 class="home-title" id="home-title-1">
    Prova
</h1>

<div class="home-title" id="home-title-3">
    <h1>
        Prova
    </h1>
    <h1>
        Delle Prove
    </h1>
    <h4 class="text-center">Pittrice, fotografa, scrittrice</h4>
</div>


<div id="box-1" class="full">

</div>

<div id="box-2" class="full">
    <h1 class="home-title" id="home-title-2">
        Delle Prove
    </h1>
</div>

<div id="box-3" class="full">

</div>



@endsection


@section('javascript')
<script>
    //Tempo di attesa prima dell'inizio dell'animazione
    const TIMEOUT_ANIMATION     = 1000;
    //Durata dell'animazione
    const ANIMATION_DURATION    = 7000;

    $(document).ready(function(){

        setTimeout(function(){
            //Animazione automatica scroll verso il basso
            $('html, body').animate({
                scrollTop: $("#box-3").offset().top
            }, ANIMATION_DURATION, function(){
                //Al termine dell'animazione rimuvo i primi due box, rendendoli irraggiungibili
                $('#box-1').remove();
                $('#box-2').remove();
            });
        }, TIMEOUT_ANIMATION);
    });

    //In base allo scroll mostro/nascondo scritte
    $(document).scroll(function(){
        if(!isInViewport($('#box-1'))){
            $('#home-title-1').remove();    //Rimuovo beatrice
            $('#home-title-3').show();      //Mostro nome e cognome
            center($('#home-title-3'));     //Centro nome e cognome
        }
    });

</script>
@endsection
