@extends('admin.layouts.admin_table')
@section('title', 'Tags')

@section('buttons')
<a href="{{url('admin/tags/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi tag</a>
@endsection

@section('cols')
    <th>
        #
    </th>
    <th>
        Nome
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
        <td>{{$item->name}}</td>
        <td class="text-right">
            <a class="btn btn-primary" href="{{url('admin/tags/edit/'.$item->id)}}"><i class="fas fa-pencil-alt"></i> Modifica</a>
            <a class="btn btn-danger" href="{{url('admin/tags/delete/'.$item->id)}}"><i class="fas fa-trash-alt"></i> Elimina</a>
        </td>
    </tr>

    @endforeach
@endsection
