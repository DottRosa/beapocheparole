@extends('admin.layouts.admin_table')
@section('title', 'Errori')

@section('cols')
    <th>
        #
    </th>
    <th>
        Errore
    </th>
    <th style="width:20%;">
        Url
    </th>
    <th>
        Pagina
    </th>
    <th class="text-center">
        Linea
    </th>
    <th class="text-right">
        Data
    </th>
@endsection

@section('rows')
    @if(count($items) == 0)
    <tr>
        <td colspan="4" class="text-center">Nessun elemento da visualizzare</td>
    </tr>
    @endif
    @foreach($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->message}}</td>
        <td>{{$item->url}}</td>
        <td>{{$item->page}}</td>
        <td class="text-center">{{$item->line}}</td>
        <td class="text-right"><code>{{$item->creation_date}}</code></td>
    </tr>

    @endforeach
@endsection
