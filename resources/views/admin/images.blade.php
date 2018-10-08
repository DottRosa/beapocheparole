@extends('layouts.admin_images')
@section('title', 'Immagini')

@section('buttons')
<a href="{{url('admin/images/list/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi immagine</a>
@endsection

@section('images')

    @foreach($items as $item)

    <div class='col-md-3'>
      <a href="" class="layers bd p-20" style="background-image:url({{url('../storage/app/'.$item->content)}});background-size:cover;height:150px;">
      </a>
      <div>
          <h6 class="lh-1">{{$item->title}}</h6>
          <div class="col-xs-12">
              @foreach($item->tags as $tag)
              <code>
                  #{{$tag->name}}
              </code>
              @endforeach
          </div>

          <a href="{{url('admin/images/list/edit/'.$item->id)}}" class="btn btn-sm btn-primary">Modifica</a>
          <a href="{{url('admin/images/list/delete/'.$item->id)}}" class="btn btn-sm btn-danger">Elimina</a>
      </div>
    </div>

    @endforeach




@endsection
