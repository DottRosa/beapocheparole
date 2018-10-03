@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
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
