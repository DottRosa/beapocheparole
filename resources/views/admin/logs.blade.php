@extends('admin.layouts.admin_table')
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
        <td>
            <span class="badge
            @if($item->action == 'LOGIN')
                badge-default
            @elseif($item->action == 'LOGOUT')
                badge-default
            @elseif($item->action == 'CREATE')
                badge-success
            @elseif($item->action == 'UPDATE')
                badge-primary
            @elseif($item->action == 'DELETE')
                badge-danger
            @endif
            ">
            {{$item->action}}
            </span>
        </td>
        <td>{{$item->description}}</td>
        <td>{{$item->username}}</td>
        <td class="text-right"><code>{{$item->creation_date}}</code></td>
    </tr>

    @endforeach
@endsection
