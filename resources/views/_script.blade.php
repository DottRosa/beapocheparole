<!-- jQuery -->
<script src="{{ url('../node_modules/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- Lightbox -->
<script src="{{ url('../node_modules/lightbox2/dist/js/lightbox.min.js')}}"></script>

<script src="{{ url('js/mouse.js')}}"></script>

<!-- Filters -->
<script src="{{ url('js/plugins/filters/filters.js')}}"></script>


<script>

const SCREEN_MD = 1200;
const SCREEN_SM = 992;
const SCREEX_XS = 768;

//Lista di elementi da centrare all'entrata nella pagina
const ELEM_TO_CENTER = [
    $('#menu'),
    $('.home-title'),
    $('#home-title-3'),
    $('#contact-form-container')
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

/*
Verifica se l'elemento esiste nel DOM in base all'id
@params id l'id dell'elemento
@return true se l'elemento esiste, false altrimenti
*/
function existsById(id){
    return document.getElementById(id) !== null;
}


function map(value, istart, istop, ostart, ostop) {
    return ostart + (ostop - ostart) * ((value - istart) / (istop - istart));
}


jQuery('img.svg').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');

});

</script>
