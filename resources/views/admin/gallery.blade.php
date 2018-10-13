@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <div class="masonry-item col-md-12">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Creazione della gallery
          <span id="entity-name">
              @if(isset($item))
                "{{$item->name}}"
              @else
                "Senza nome"
              @endif

          </span>
      </h4>
      <div class="mT-30">

          <form class="form-horizontal form-label-left"
                method="POST"
                autocomplete="off"
                enctype="multipart/form-data"
                action="@if(isset($item)){{ action('AdminGallery@update', ['id' => $item->id]) }}@else{{ action('AdminGallery@create') }}@endif">
                {{ csrf_field() }}

            <div class="form-group row">
                <label for="input-name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text"
                       class="form-control"
                       id="input-name"
                       name="name"
                       placeholder="Nome"
                       @if(isset($item))value="{{$item->name}}"@endif>
                       @if(isset($errs) && isset($errs['name']))
                       <small class="text-danger">{{$errs['name']}}</small>
                       @endif
                </div>
            </div>
          <div class="form-group row">
            <label for="input-image" class="col-sm-2 col-form-label">Immagine di copertina</label>
            <div class="col-sm-10">
              <input type="file"
                     class="form-control"
                     id="input-image"
                     name="thumb"
                     placeholder="Carica un'immagine di copertina"
                     @if(isset($item))value="{{url('../storage/app/'.$item->thumb)}}"@endif>
            </div>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <label class="col-sm-2">Stato</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input"
                           type="radio"
                           name="status"
                           value="PUBLIC"
                           @if(isset($item) && $item->status == 'PUBLIC')checked="checked"@endif
                           @if(!isset($item))checked="checked"@endif>
                    Pubblicato
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input"
                             type="radio"
                             name="status"
                             value="PRIVATE"
                             @if(isset($item) && $item->status == 'PRIVATE')checked="checked"@endif>
                      Non pubblicato
                    </label>
                </div>
              </div>
            </div>
          </fieldset>

          <hr />
          <table class="table">
              <thead>
                  <th>
                      Nome
                  </th>
                  <th>
                      Tipologia
                  </th>
                  <th>
                      Azioni
                  </th>
              </thead>
              <tbody id="confirmed-media">
                  @if(isset($item))
                    @foreach($item->media as $count => $medium)
                    <tr id="{{$medium->type}}-{{$medium->id}}-{{$count}}" data-id="{{$medium->id}}" data-type="{{$medium->type}}">
                        <td>{{$medium->title}}</td>
                        <td>
                            @if($medium->type == 'IMG')
                                Immagine
                            @elseif($medium->type == 'TXT')
                                Testo
                            @endif
                        </td>
                        <td>
                            <button type='button' onclick='deleteMedium("{{$medium->type}}-{{$medium->id}}-{{$count}}")'>Rimuovi</button>
                            <input type='hidden' value='{{$medium->id}}' name='id[]'>
                        </td>
                    </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>

          <div class="form-group row">
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#media-modal' onclick="openModal();">Aggiungi contenuto</button>
            </div>
          </div>

          <hr />

          <div class="form-group row">
            <div class="col-sm-10">
                <a href="{{url('admin/galleries/list')}}" class="btn btn-default">Annulla</a>
                @if(isset($item))
                <button type="submit" class="btn btn-primary">Modifica</button>
                @else
                <button type="submit" class="btn btn-success">Aggiungi</button>
                @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="media-modal" role="dialog">
  <div class="modal-dialog" style="max-width:100% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h5>Cerca per nome o tag</h5>
      </div>
      <div class="modal-body row" id="search-results">
          <div class="col-sm-12">
              <div class="filters form-inline">
                  <div class="form-group col-md-4">
                      <input type="text" id="input-search" class="form-control"/>
                  </div>
                  <div class="form-group col-md-4">
                      <div class="form-group row">
                        <label for="input-image" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <select class="selectpicker multiselect" multiple data-live-search="true" name="tags[]">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}">
                                    {{$tag->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4 form-group">
                      <button type="button" onclick="changeTab('IMG');">Immagini</button>
                      <button type="button" onclick="changeTab('TXT');">Testi</button>
                  </div>
              </div>
              <div class="results col-md-12">
                  <h5 id="results-title">Immagini</h5>
                  <article id="results-list" class="row">

                  </article>
                  <div class="pull-right pagination">
                      <button id="pagination-prev" class="btn btn-default" onclick="prevPage();">Indietro</button>
                      <button id="pagination-next" class="btn btn-default" onclick="nextPage();">Avanti</button>
                      <span id="pagination-total"></span>
                  </div>
              </div>
          </div>
          <div class="col-sm-12">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Nome</th>
                          <th>Tipologia</th>
                          <th>Azioni</th>
                      </tr>
                  </thead>
                  <tbody id="selected-media">

                  </tbody>
              </table>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="confirmMedia();">Conferma</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="loadMediaCache();">Annulla</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('javascript')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

    /* FLUSSO DI AGGIUNTA MEDIA ALLA GALLERY */

    /* Definisco tabella A quella che si vede nella pagina e tabella B quella della
    modale. Quando si vuole aggiungere un nuovo media, al click sul pulsante la tabella
    A viene svuotata e il suo contenuto viene salvato in una cache e trasportato nella
    tabella B. Qui l'utente può aggiungere, togliere o spostare elementi. Al click su
    "Conferma" il contenuto della tabella B viene rimosso e spostato nella tabella A.
    Se invece l'utente preme "Annulla" il contenuto della tabella B viene svuotato
    e la tabella A viene riempita con il contenuto della cache salvata precedentemente.
    Nella tabella A è possibile spostare ed eliminare elementi. Le modifiche si rifletteranno
    sulla tabella B quando verrà aperta, in quando c'è sempre il passaggio di contenuti da
    una tabella all'altra.*/


    /* Inizializzazione del timeout per la ricerca */
    var ajaxTimer       = 0;
    /* Delay per la ricerca in ajax, evita troppe chiamate al db */
    var ajaxDelay       = 1000;
    /* Limite e offset per la ricerca in ajax */
    var limit           = 6;
    var offset          = 0;
    /* Contenitore dei media selezionati nella modale */
    var selectedMedia   = $( "#selected-media" );
    /* Contenitore dei media selezionati */
    var confirmedMedia  = $( "#confirmed-media" );

    @if(isset($item))
    var counterForId    = {{count($item->media)}};
    @else
    var counterForId    = 0;
    @endif

    /* La tipologia di default per ajax */
    var currentType     = 'IMG';
    /* Il totale dei media che sarebbero stati trovati senza limit */
    var paginationTotal = 0;

    var mediaCache      = null;



    $( function() {
        $(selectedMedia).sortable();
        $(selectedMedia).disableSelection();

        $(confirmedMedia).sortable();
        $(confirmedMedia).disableSelection();

        ajaxCall();   //Prende tutti i media con currentType
    });


    $('#input-name').keyup(function(){
        var s = $(this).val();
        $('#entity-name').text("\""+s+"\"");
    });


    /*
    Ogni volta che viene premuto un tasto nella modale di ricerca viene effettuata
    una chiamata ajax per trovare i contenuti. C'è un delay per evitare di effettuare
    troppe richieste al secondo.
    */
    $('#input-search').keydown(function(){
        if (ajaxTimer) {
            clearTimeout(ajaxTimer);
        }
        ajaxTimer = setTimeout(function(){
            ajaxCall();
            //getMedia($('#input-search').val());
        }, ajaxDelay);
    });


    /*
    Esegue una chiamata ajax per prelevare i media in base alla ricerca, ai tag e
    alla tipologia.
    */
    function ajaxCall(){
        var data = {
            q       : $('#input-search').val(),
            offset  : offset,
            limit   : limit,
            type    : currentType,
            _token  : '{{csrf_token()}}'
        };

        $.ajax({
            type:'GET',
            url:"{{url('admin/media/search')}}",
            data:data,
            success:function(data){
                fillSearchResults(JSON.parse(data));
            }
        });
    }

    /*
    Riempie la modal di tutti i contenuti trovati tramite ricerca
    @params items tutti gli elementi della ricerca in ajax
    */
    function fillSearchResults(result){
        var rl = $('#results-list');
        $(rl).empty();

        paginationTotal = result.total;

        pagination();

        $(result.items).each(function(){
            var item = this;

            var typeClass = item.type.toLowerCase();

            elem =  "<section class='result col-md-2 "+typeClass+"' onclick='addMedia("+item.id+", \""+item.title+"\", \""+item.type+"\");' data-id='"+item.id+"' data-type='"+item.type+"'>";

            if(item.type == 'IMG'){
                elem += "   <div style='background-image:url({{url('../storage/app')}}/"+item.content+")'></div>";
            } else if(item.type == 'TXT'){
                elem += "   <div>"+item.content.replace(/(<([^>]+)>)/ig,"").substring(0, 250)+"</div>";
            }
            elem +=     "<p class='medium-title'>"+item.title+"</p>";
            elem += "</section>";
            $(rl).append(elem);
        });
    }

    function pagination(){
        var totalString = '';
        if(paginationTotal > 1 || paginationTotal == 0){
            totalString = ' elementi trovati';
        } else {
            totalString = ' elemento trovato';
        }
        $('#pagination-total').text(paginationTotal+totalString);

        if(offset > 0){
            $('#pagination-prev').prop('disabled', false);
        } else {
            $('#pagination-prev').prop('disabled', true);
        }

        if(paginationTotal > offset + limit){
            $('#pagination-next').prop('disabled', false);
        } else {
            $('#pagination-next').prop('disabled', true);
        }
    }

    /*
    Paginazione per tornare nella pagina precedente
    */
    function prevPage(){
        if(offset >= limit){
            offset -= limit;
            //console.log('prev', offset, paginationTotal);
            ajaxCall();
        } else {
            offset = 0;
        }
    }

    /*
    Paginazione per andare nella pagina successiva
    */
    function nextPage(){
        if(offset <= paginationTotal && (offset + limit) < paginationTotal){
            offset += limit;
            //console.log('next', offset, paginationTotal);
            ajaxCall();
        }
    }


    /*
    Aggiorna il testo e la posizione di ogni elemento medium
    */
    function normalizeOrder(){
        count = 0;
        $('.medium').each(function(counter){
            $($(this).find('.medium-title')).text('Contenuto '+(counter+1));
            count++;
        });
    }


    /*
    Elimina un medium dalla tabella
    @param id la riga da eliminare
    */
    function deleteMedium(id){
        $('#'+id).remove();
    }

    /*
    Conferma i media scelti su modale
    */
    function confirmMedia(){
        var elem = $(selectedMedia).html();
        $(selectedMedia).empty();
        $(confirmedMedia).empty();
        $(confirmedMedia).append(elem);
    }

    /*
    Trasporta i media confermati nella tabella dei media della modale
    */
    function openModal(){
        var elem = $(confirmedMedia).html();
        setTimeout(function(){
            $(confirmedMedia).empty();
        }, 500);

        $(selectedMedia).empty();
        $(selectedMedia).append(elem);

        mediaCache = elem;
    }

    function loadMediaCache(){
        $(selectedMedia).empty();
        $(confirmedMedia).empty();
        $(confirmedMedia).append(mediaCache);
    }



    /*
    Aggiorna i campi di input per il singolo contenuto aggiunto
    @params id l'id del medium
    @params title il nome del medium
    @params type il tipo del medium
    */
    function addMedia(id, title, type){
        if(!isUnique(id, type)){
            return;
        }

        var elemId = type+"-"+id+"-"+counterForId;
        counterForId++;

        var elem = "<tr id='"+elemId+"' data-id='"+id+"' data-type='"+type+"'>";
        elem    += "   <td>"+title+"</td>";
        elem    += "   <td>"+(type == 'IMG' ? 'Immagine' : 'Testo')+"</td>";
        elem    += "   <td>";
        elem    += "       <button type='button' onclick='deleteMedium(\""+elemId+"\")'>Rimuovi</button>";
        elem    += "       <input type='hidden' value='"+id+"' name='id[]'>";
        elem    += "   </td>";
        elem    += "</tr>";

        $(selectedMedia).append(elem);

        //$($(selectedMedia).find('.result[data-id='+id+'][data-type='+type+']')[0]).addClass('added');
    }

    /*
    Verifica se un media è giò stato inserito o meno nella tabella
    @param id l'id del media
    @param type il type del media
    */
    function isUnique(id, type){
        var founded = $(selectedMedia).find('tr[data-id='+id+'][data-type='+type+']').length;
        return founded == 0;
    }


    /*
    Permette di passare da una tipologia di media all'altro e applica il filtro.
    @param type la tipologia da filtrare e da mostrare
    */
    function changeTab(type){
        if(type != currentType){    //Inutile fare ajax per niente
            currentType = type;
            if(currentType == 'IMG'){
                $('#results-title').text('Immagini');
            } else if(currentType == 'TXT'){
                $('#results-title').text('Testi');
            }
            offset = 0;
            ajaxCall();
        }
    }


</script>
@endsection
