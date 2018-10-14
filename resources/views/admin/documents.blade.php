@extends('admin.layouts.admin_table')
@section('title', 'Testi')

@section('buttons')
<a href="{{url('admin/documents/list/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi testo</a>
@endsection

@section('cols')
    <th>
        #
    </th>
    <th>
        Titolo
    </th>
    <th class="text-center">
        Tags
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
        <td>{{$item->title}}</td>
        <td class="text-center">
            @foreach($item->tags as $tag)
            <code>
                #{{$tag->name}}
            </code>
            @endforeach
        </td>
        <td class="text-right">
            <a class="btn btn-primary" href="{{url('admin/documents/list/edit/'.$item->id)}}"><i class="fas fa-pencil-alt"></i> Modifica</a>
            <a class="btn btn-danger" href="{{url('admin/documents/list/delete/'.$item->id)}}"><i class="fas fa-trash-alt"></i> Elimina</a>
        </td>
    </tr>

    @endforeach
@endsection
