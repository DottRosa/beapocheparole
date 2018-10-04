@extends('layouts.admin_table')
@section('title', 'Categorie immagini')

@section('buttons')
<a href="{{url('admin/images/categories/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi categoria</a>
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
            <a class="btn btn-primary" href="{{url('admin/images/categories/edit/'.$item->id)}}"><i class="fas fa-pencil-alt"></i> Modifica</a>
            <a class="btn btn-danger" href="{{url('admin/images/categories/delete/'.$item->id)}}"><i class="fas fa-trash-alt"></i> Elimina</a>
        </td>
    </tr>

    @endforeach
@endsection
