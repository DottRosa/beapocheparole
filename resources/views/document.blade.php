@extends('layouts.layout_base')
@section('title', $item->title)
@section('page-id', 'document')

@section('content')
<h2>
    {{ $item->title }}
</h2>
<div>
    {!! $item->content !!}
</div>

@endsection
