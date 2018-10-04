@extends('layouts.admin_table')
@section('title', 'Logs')

@section('cols')
    <th>
        #
    </th>
    <th>
        Azione
    </th>
    <th>
        Descrizione
    </th>
    <th>
        Utente
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
        <td>{{$item->action}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->username}}</td>
        <td class="text-right">{{$item->creation_date}}</td>
    </tr>

    @endforeach
@endsection
