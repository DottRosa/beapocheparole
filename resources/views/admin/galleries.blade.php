@extends('layouts.admin_table')
@section('title', 'Gallerie')

@section('buttons')
<a href="{{url('admin/galleries/list/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi galleria</a>
@endsection

@section('cols')
    <th>
        #
    </th>
    <th>
        Nome
    </th>
    <th class="text-center">
        Stato
    </th>
    <th class="text-right">
        Azioni
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
        <td>{{$item->position}}</td>
        <td>{{$item->name}}</td>
        <td class="text-center">
            @if($item->status == 'PUBLIC')
                <span class="badge badge-success">Pubblicato</span>
            @else
                <span class="badge badge-danger">Non pubblicato</span>
            @endif
        </td>
        <td class="text-right">
            <a class="btn btn-primary" href="{{url('admin/galleries/list/edit/'.$item->id)}}"><i class="fas fa-pencil-alt"></i> Modifica</a>
            <a class="btn btn-danger" href="{{url('admin/galleries/list/delete/'.$item->id)}}"><i class="fas fa-trash-alt"></i> Elimina</a>
        </td>
    </tr>

    @endforeach
@endsection
