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
        Username
    </th>
    <th class="text-center">
        Permesso
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
        <td>{{$item->id}}</td>
        <td>{{$item->username}}</td>
        <td class="text-center">
            @if($item->permission == 'ADMIN')
                <i class="fas fa-rocket fa-2x"></i>
            @else
                <i class="fas fas-3x fa-user fa-2x"></i>
            @endif
        </td>
        <td class="text-right">
            <a class="btn btn-primary" href="{{url('admin/galleries/list/edit/'.$item->id)}}"><i class="fas fa-pencil-alt"></i> Modifica</a>
            <a class="btn btn-danger" href="{{url('admin/galleries/list/delete/'.$item->id)}}"><i class="fas fa-trash-alt"></i> Elimina</a>
        </td>
    </tr>

    @endforeach
@endsection
