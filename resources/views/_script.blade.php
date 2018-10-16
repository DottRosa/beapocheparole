<!-- jQuery -->
<script src="{{ url('../node_modules/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- Lightbox -->
<script src="{{ url('../node_modules/lightbox2/dist/js/lightbox.min.js')}}"></script>


<script>

//Lista di elementi da centrare all'entrata nella pagina
const ELEM_TO_CENTER = [
    $('#menu'),
    $('.home-title'),
    $('#home-title-3')
];

$(document).ready(function(){
    centerAll();
});

$(window).resize(function(){
    centerAll();
});

/*
Centra un elemento verticalmente rispetto alla finestra
@params elem l'elemento da centrare
*/
function center(elem){
    var half = window.innerHeight/2;
    var mt = half - $(elem).outerHeight()/2;
    $(elem).css('margin-top', mt);
}

/*
Centra tutti gli elementi impostati nell'array elemToCenter
*/
function centerAll(){
    $(ELEM_TO_CENTER).each(function(){
        center(this);
    });
}

/*
Verifica se l'elemento è visibile in base allo scroll
@params elem l'elemento da verificare
@return true se l'elemento è visibile, false altrimenti
*/
function isInViewport(elem) {
    var elementTop = $(elem).offset().top;
    var elementBottom = elementTop + $(elem).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
};


</script>
