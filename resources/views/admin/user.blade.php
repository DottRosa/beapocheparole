@extends('layouts.admin')
@section('content')

  <div class="masonry-item col-md-12">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Aggiungi utente</h4>
      <div class="mT-30">
          <form class="form-horizontal form-label-left"
                method="POST"
                autocomplete="off"
                action="@if(isset($item)){{ action('AdminUser@update', ['id' => $item->id]) }}@else{{ action('AdminUser@create') }}@endif">
                {{ csrf_field() }}

          <div class="form-group row">
            <label for="input-username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text"
                     class="form-control"
                     id="input-username"
                     name="username"
                     placeholder="Username"
                     @if(isset($item))value="{{$item->username}}"@endif>
            </div>
          </div>
          <div class="form-group row">
            <label for="input-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password"
                     class="form-control"
                     id="input-password"
                     name="password"
                     placeholder="Password">
            </div>
          </div>
          <fieldset class="form-group">
            <div class="row">
              <label class="col-sm-2">Permessi</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input"
                           type="radio"
                           name="permission"
                           value="USER"
                           @if(isset($item) && $item->permission == 'USER')checked="checked"@endif
                           @if(!isset($item))checked="checked"@endif>
                    Utente
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input"
                             type="radio"
                             name="permission"
                             value="ADMIN"
                             @if(isset($item) && $item->permission == 'ADMIN')checked="checked"@endif>
                      Amministratore
                    </label>
                </div>
              </div>
            </div>
          </fieldset>
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
