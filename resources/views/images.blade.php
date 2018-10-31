@extends('layouts.layout_base')
@section('body-class', 'wall')
@section('title', 'Home')
@section('page-id', 'images')

@section('content')
    <div class="col-xs-12 main-title">
        <h1 class="page-title inverse pull-left">Immagini</h1>
        <div class="pull-right mt-xlg">
            @include('_filters', ['page' => 'immagini'])
        </div>
    </div>

    @if(count($items) != 0)
        @foreach($items as $item)

            <a class="polaroid col-lg-3 col-md-4 col-sm-6 col-xs-12" href="{{url('../storage/app/'.$item->content)}}" data-lightbox="images" data-title="{{$item->title}}">
                <div class="frame">
                    <img class="tape tape-rotate-{{rand(1,3)}}" src="{{url('dist/images/tape.png')}}" />
                    <div style="background-image:url({{url('../storage/app/'.$item->thumb)}})"></div>
                    <h4 @if(strlen($item->title) > 56)class="little-title"@endif>
                        {{$item->title}}
                    </h4>
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
