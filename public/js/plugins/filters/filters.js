var tags = [];

$(function(){
    $('#input-tags').children().each(function(){
        tags.push(parseInt($(this).val()));
    });
});

function selectTag(elem, id){
    $(elem).toggleClass('active');
    var icon = $(elem).find('i')[0];

    if($.inArray(id, tags) === -1){
        tags.push(id);
        $(icon).addClass('fas fa-check-square').removeClass('far fa-square');
    } else {
        tags.splice($.inArray(id, tags), 1);
        $(icon).addClass('far fa-square').removeClass('fas fa-check-square');
    }
}

$('#filters-form').submit(function(e){
    e.preventDefault();
    $('#input-tags').empty();
    var elems = '';
    $(tags).each(function(){
        elems += "<input type='hidden' value='"+this+"' name='tags[]' />";
    });
    $('#input-tags').append(elems);
    $(this)[0].submit();
});
