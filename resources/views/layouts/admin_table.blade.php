@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="col-xs-12">
                <h4 class="pull-left">Utenti</h4>
                <div class="pull-right">
                    <a href="{{url('admin/users/add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi utente</a>
                </div>
            </div>




          <table class="table">
            <thead>
              <tr>
                @section('cols')
                @show
              </tr>
            </thead>
            <tbody>
                @section('rows')
                @show
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
