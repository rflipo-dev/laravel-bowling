@extends('admin.layouts.list')

@section('page-title', 'Launches')

@section('title')
Launches
@endsection

@section('breadcrumb')
  @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Launches', 'url' => 'launches']]])
@endsection

  @section('pagination')
    @widget('Bowling.Widgets.Admin.Pagination', [], $launches)
  @endsection

  @section('filters')
  <p>Pas de filtres disponibles</p>
  <br />
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg btn-block" href="{{route('admin::launches.create')}}">Ajouter une entité</a>
    </div>
  </div>
  @endsection


  @section('table')
    <thead>
      <tr>
        <th>
          Id
        </th>
        <th>
          Score
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($launches as $launch)
      <tr>
        <td>
          {{$launch->id}}
        </td>
        <td>
          {{$launch->score}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::launches.show', ['id' => $launch->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  @endsection
