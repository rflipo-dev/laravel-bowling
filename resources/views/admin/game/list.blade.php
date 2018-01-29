@extends('admin.layouts.list')

@section('page-title', 'Games')

@section('title')
Games
@endsection

@section('breadcrumb')
  @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Games', 'url' => 'games']]])
@endsection

  @section('pagination')
    @widget('Bowling.Widgets.Admin.Pagination', [], $games)
  @endsection

  @section('filters')
  <p>Pas de filtres disponibles</p>
  <br />
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg btn-block" href="{{route('admin::games.create')}}">Ajouter une entité</a>
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
          Statut
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($games as $game)
      <tr>
        <td>
          {{$game->id}}
        </td>
        <td>
          {{$game->status}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::games.show', ['id' => $game->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  @endsection
