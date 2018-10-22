@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'images')

@section('content')
    @foreach($items as $item)

    <a class="polaroid col-lg-3 col-md-4 col-sm-6 col-xs-12" href="{{url('../storage/app/'.$item->content)}}" data-lightbox="images" data-title="{{$item->title}}">
        <div class="frame">
            <img class="tape tape-rotate-{{rand(1,3)}}" src="{{url('dist/images/tape.png')}}" />
            <div style="background-image:url({{url('../storage/app/'.$item->content)}})"></div>
            <h4>{{$item->title}}</h4>
        </div>

    </a>

    @endforeach
@endsection
