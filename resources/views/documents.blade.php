@extends('layouts.layout_base')
@section('title', 'Testi')
@section('page-id', 'documents')

@section('content')

    @foreach($items as $item)
    <a href="" class="document col-sm-3">
        <span class="content">
            {{str_limit(strip_tags($item->content), $limit = 450, $end = '...')}}
        </span>
        <h3>{{$item->title}}</h3>
    </a>

    @endforeach

    @foreach($items as $item)
    <a href="" class="document col-sm-3">
        <span class="content">
            {{str_limit(strip_tags($item->content), $limit = 450, $end = '...')}}
        </span>
        <h3>{{$item->title}}</h3>
    </a>

    @endforeach

    @foreach($items as $item)
    <a href="" class="document col-sm-3">
        <span class="content">
            {{str_limit(strip_tags($item->content), $limit = 450, $end = '...')}}
        </span>
        <h3>{{$item->title}}</h3>
    </a>

    @endforeach

@endsection
