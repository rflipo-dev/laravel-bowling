@extends('admin.layouts.list')

@section('page-title', 'Players')

@section('title')
Players
@endsection

@section('breadcrumb')
  @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Players', 'url' => 'users']]])
@endsection

  @section('pagination')
    @widget('Bowling.Widgets.Admin.Pagination', [], $users)
  @endsection

  @section('filters')
  <p>Pas de filtres disponibles</p>
  <br />
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg btn-block" href="{{route('admin::users.create')}}">Ajouter une entité</a>
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
          Firstname
        </th>
        <th>
          Lastname
        </th>
        <th>
          Username
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>
          {{$user->id}}
        </td>
        <td>
          {{$user->firstname}}
        </td>
        <td>
          {{$user->lastname}}
        </td>
        <td>
          {{$user->username}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::users.show', ['id' => $user->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  @endsection
