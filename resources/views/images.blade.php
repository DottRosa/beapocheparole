@extends('layouts.layout_base')
@section('title', 'Home')
@section('page-id', 'images')

@section('content')

    @foreach($items as $item)

    <a class="portait col-sm-3" href="{{url('../storage/app/'.$item->content)}}" data-lightbox="images" data-title="{{$item->title}}">
        <div class="frame">
            <div style="background-image:url({{url('../storage/app/'.$item->content)}})"></div>
        </div>
        <div class="plate">
            {{$item->title}}
        </div>

    </a>

    @endforeach

@endsection
