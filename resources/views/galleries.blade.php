@extends('layouts.layout_base')
@section('title', 'Gallerie')
@section('page-id', 'galleries')

@section('content')

@foreach($items as $item)
<a class="portait col-lg-3 col-md-4 col-sm-6 col-xs-12" href="{{url('gallery')}}/{{$item->id}}">
    <div class="frame">
        <div style="background-image:url({{url('../storage/app/'.$item->thumb)}})"></div>
    </div>
    <div class="plate">
        {{$item->name}}
    </div>
</a>

@endforeach



@endsection
