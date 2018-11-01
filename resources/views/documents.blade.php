@extends('layouts.layout_base')
@section('body-class', 'table')
@section('title', 'Testi')
@section('page-id', 'documents')

@section('content')

    <div class="col-xs-12 main-title">
        <h1 class="page-title pull-left">Testi</h1>
        <div class="pull-right mt-xlg">
            @include('_filters', ['page' => 'testi'])
        </div>
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
        <a href="{{url('testi')}}/{{$item->id}}" class="document col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="book">
                <div class="pages">
                    {{str_limit(strip_tags($item->content), $limit = 660, $end = '...')}}
                </div>
                <div class="cover texture">
                    <h3>{{$item->title}}</h3>
                </div>
            </div>
        </a>
        @endforeach

        <div class="col-xs-12 text-center">
            {{$items->appends(request()->except('page'))->links()}}
        </div>
    @else
        <div class="col-xs-12 text-center">
            <p>
                Nessun testo trovato
            </p>
        </div>
    @endif

@endsection
