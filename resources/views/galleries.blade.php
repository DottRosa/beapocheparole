@extends('layouts.layout_base')
@section('body-class', '')
@section('title', 'Gallerie')
@section('page-id', 'galleries')

@section('content')

<div class="col-xs-12 main-title">
    <h1 class="page-title">
        <img class="svg svg-baseline" src="{{url('dist/images/icons/ic_gallery.svg')}}" />
        Gallerie
    </h1>
</div>

    @foreach($items as $item)
    <a class="portait col-lg-3 col-md-4 col-sm-6 col-xs-12 animated zoomIn" href="{{url('gallery')}}/{{$item->id}}">
        <div class="frame">
            <div style="background-image:url({{url('../storage/app/'.$item->thumb)}})"></div>
        </div>
        <div class="plate">
            {{$item->name}}
        </div>
    </a>

    @endforeach
@endsection
