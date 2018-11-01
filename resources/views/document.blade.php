@extends('layouts.layout_base')
@section('title', $item->title)
@section('page-id', 'document')

@section('content')
<div class="col-xs-12 main-title">
    <h1 class="page-title text-center">{{ $item->title }}</h1>
</div>
<div class="content">
    {!! $item->content !!}
</div>

@endsection
