@extends('layouts.admin')
@section('content')

<style>
.bs-placeholder{

}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <div class="masonry-item col-md-12">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Aggiungi immagine</h4>
      <div class="mT-30">

          <form class="form-horizontal form-label-left"
                method="POST"
                autocomplete="off"
                enctype="multipart/form-data"
                action="@if(isset($item)){{ action('AdminImage@update', ['id' => $item->id]) }}@else{{ action('AdminImage@create') }}@endif">
                {{ csrf_field() }}

            <div class="form-group row">
                <label for="input-name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text"
                       class="form-control"
                       id="input-name"
                       name="title"
                       placeholder="Nome"
                       @if(isset($item))value="{{$item->title}}"@endif>
                </div>
            </div>
          <div class="form-group row">
            <label for="input-image" class="col-sm-2 col-form-label">Immagine</label>
            <div class="col-sm-10">
              <input type="file"
                     class="form-control"
                     id="input-image"
                     name="content"
                     placeholder="Carica un'immagine"
                     @if(isset($item))value="{{url('../storage/app/'.$item->content)}}"@endif>

                     @if(isset($item) && isset($item->content))
                     <img src="{{url('../storage/app/'.$item->content)}}" width="100%;"/>
                     @endif
            </div>


          </div>

          <div class="form-group row">
            <label for="input-image" class="col-sm-2 col-form-label">Tags</label>
            <div class="col-sm-10">
                <select class="selectpicker multiselect" multiple data-live-search="true" name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(isset($item) && in_array($tag->id, $item->tags))selected="selected"@endif>
                        {{$tag->name}}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
                <a href="{{url('admin/users')}}" class="btn btn-default">Annulla</a>
                @if(isset($item))
                <button type="submit" class="btn btn-primary">Modifica</button>
                @else
                <button type="submit" class="btn btn-success">Aggiungi</button>
                @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script>

   $(function(){
       $('.selectpicker').selectpicker({

       });
   });
</script>
@endsection
