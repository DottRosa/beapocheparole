@extends('layouts.layout_base')
@section('title', 'Testi')
@section('page-id', 'documents')

@section('content')

    @foreach($items as $item)
    <a href="{{url('testi')}}/{{$item->id}}" class="document col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="book">
            <div class="pages">
                {{str_limit(strip_tags($item->content), $limit = 660, $end = '...')}}
            </div>
            <div class="cover">
                <h3>{{$item->title}}</h3>
            </div>

        </div>
    </a>

    @endforeach

@endsection
