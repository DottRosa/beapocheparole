@extends('layouts.admin')
@section('content')

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
                       name="name"
                       placeholder="Nome">
                </div>
            </div>
          <div class="form-group row">
            <label for="input-image" class="col-sm-2 col-form-label">Immagine</label>
            <div class="col-sm-10">
              <input type="file"
                     class="form-control"
                     id="input-image"
                     name="image"
                     placeholder="Carica un'immagine">
            </div>
          </div>


          <div class="form-group row">
            <label for="input-image" class="col-sm-2 col-form-label">Tags</label>
            <div class="col-sm-10">
                <select class="selectpicker multiselect" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function(){
    getMessage();
})
   function getMessage(){
      $.ajax({
         type:'GET',
         url:"{{url('admin/tags/find')}}",
         data:'_token = <?php echo csrf_token() ?>',
         success:function(data){
            console.log(data);
         }
      });
   }

   $(function(){
       $('.multiselect').multiselect();
   });
</script>
@endsection
