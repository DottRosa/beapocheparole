@extends('layouts.layout_base')
@section('title', $item->name)
@section('page-id', 'gallery')

@section('content')

<div class="container">
    <div id="wall" class="col-xs-12">

        @if($item->media[0]->type == 'IMG')
        <div class="box box-back front-right"></div>
        @else
        <div class="box box-back no-front-right"></div>
        @endif

        @php($total = count($item->media))

        @for($i=0; $i<$total; $i++)

            @php($m = $item->media[$i])

            @if($i != 0)
                @php($prev = $item->media[$i-1])
            @else
                @php($prev = null)
            @endif

            @if($i+1 < $total)
                @php($next = $item->media[$i+1])
            @else
                @php($next = null)
            @endif

            @php($class = 'box ')

            @if($m->type == 'IMG')
                @php($class .= 'box-front ')
            @else
                @php($class .= 'box-back ')

                @if($prev != null && $prev->type == 'IMG')
                    @php($class .= 'front-left ')
                @else
                    @php($class .= 'no-front-left ')
                @endif

                @if($next != null && $next->type == 'IMG')
                    @php($class .= 'front-right ')
                @else
                    @php($class .= 'no-front-right ')
                @endif
            @endif

            <div class="{{$class}}">

                @if($m->type == 'IMG')
                    <a class="image" href="{{url('../storage/app/'.$m->content)}}" data-lightbox="{{$m->id}}" data-title="{{$m->title}}" style="background-image:url({{url('../storage/app/'.$m->content)}})">

                    </a>
                    <h4 class="text-center">{{$m->title}}</h4>
                @else
                    <h4>{{$m->title}}</h4>
                    <div class="text">
                        {{str_limit(strip_tags($m->content), $limit = 660, $end = '...')}}
                        <br />
                        <button onclick="openDocument({{$m}});" data-toggle="modal" data-target="#document-modal" class="btn btn-default mt-md">Leggi</button>
                    </div>
                @endif
            </div>
        @endfor

        @if($item->media[$i-1]->type == 'IMG')
        <div class="box box-back front-left"></div>
        @else
        <div class="box box-back no-front-left"></div>
        @endif
    </div>
</div>


<!-- Modal -->
<div id="document-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>


@endsection


@section('javascript')
<script>

    $(document).ready(function(){
        $('body').addClass('bg-gallery');

        var totalSize = 0;
        $('.box').each(function(){
            totalSize += $(this).outerWidth();
        });
        totalSize += 100;
        //$('#wall').css('height', totalSize+'px');
    });

    function openDocument(d){
        $('.modal-title').html(d.title);
        $('.modal-body').html(d.content);
    }

</script>
@endsection
