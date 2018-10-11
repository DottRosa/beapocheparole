@extends('layouts.admin')
@section('content')

<style>
.bs-placeholder{

}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <div class="masonry-item col-md-12">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Aggiungi testo</h4>
      <div class="mT-30">

          <form class="form-horizontal form-label-left"
                method="POST"
                autocomplete="off"
                enctype="multipart/form-data"
                action="@if(isset($item)){{ action('AdminDocument@update', ['id' => $item->id]) }}@else{{ action('AdminDocument@create') }}@endif">
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
            <label for="ckeditor" class="col-sm-2 col-form-label">Testo</label>
            <div class="col-sm-10">
                <textarea name="content" id="ckeditor" rows="10" cols="80">@if(isset($item)){{$item->content}}@endif</textarea>
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
                @if(isset($item))
                <a href="{{url('admin/users')}}" class="btn btn-default">Annulla</a>
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
       CKEDITOR.replace('ckeditor');

       $('.selectpicker').selectpicker({

       });
   });
</script>
@endsection
