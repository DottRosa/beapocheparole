@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="col-xs-12">
                <h4 class="pull-left">@yield('title')</h4>
                <div class="pull-right">
                @section('buttons')
                @show
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
        <div class="pull-right">
            {{$items->links()}}
        </div>

      </div>



    </div>
</div>
@endsection
