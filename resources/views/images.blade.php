@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'images')


@section('filters')

@endsection



@section('content')
    <div class="col-xs-12">
        <h1>Immagini</h1>
    </div>


    @if($filter_by_tag)
    <div class="col-xs-12" id="applied-filters">
        <p>
            Risultati ottenuti in base alle categorie:
            @foreach($tags as $tag)
                @if($tag->active)
                <span class="applied_filter">#{{$tag->name}}</span>
                @endif
            @endforeach
        </p>
    </div>
    @endif

    @if(count($items) != 0)
        @foreach($items as $item)

            <a class="polaroid col-lg-3 col-md-4 col-sm-6 col-xs-12" href="{{url('../storage/app/'.$item->content)}}" data-lightbox="images" data-title="{{$item->title}}">
                <div class="frame">
                    <img class="tape tape-rotate-{{rand(1,3)}}" src="{{url('dist/images/tape.png')}}" />
                    <div style="background-image:url({{url('../storage/app/'.$item->content)}})"></div>
                    <h4>{{$item->title}}</h4>
                </div>
            </a>

            @endforeach
            <div class="col-xs-12 text-center">
                {{$items->appends(request()->except('page'))->links()}}
            </div>
        @endsection
    @else
        <div class="col-xs-12 text-center">
            <p>
                Nessuna immagine trovata
            </p>
        </div>
    @endif


@section('javascript')

@endsection
