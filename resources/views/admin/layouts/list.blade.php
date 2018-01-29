@extends('admin.layouts.page')

@section('content')

  @yield('pagination')

    <div class="panel panel-success">
    <div class="panel-heading">Filtres</div>
        <div class="panel-body">
            @yield('filters')
        </div>
    </div>

    <div class="box box-success">
        <div class="box-content">
          <table class="table table-hover">
            @yield('table')
          </table>
        </div>
      </div>
@endsection