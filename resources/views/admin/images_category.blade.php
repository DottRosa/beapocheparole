@extends('layouts.admin')
@section('content')

  <div class="masonry-item col-md-12">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Aggiungi categoria immagine</h4>
      <div class="mT-30">
          <form class="form-horizontal form-label-left"
                method="POST"
                autocomplete="off"
                action="@if(isset($item)){{ action('AdminImagesCategory@update', ['id' => $item->id]) }}@else{{ action('AdminImagesCategory@create') }}@endif">
                {{ csrf_field() }}

          <div class="form-group row">
            <label for="input-name" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
              <input type="text"
                     class="form-control"
                     id="input-name"
                     name="name"
                     placeholder="Nome categoria"
                     @if(isset($item))value="{{$item->name}}"@endif>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
                @if(isset($item))
                <a href="{{url('admin/images/categories')}}" class="btn btn-default">Annulla</a>
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
