@extends('admin.layouts.list')

@section('page-title', 'Frames')

@section('title')
Frames
@endsection

@section('breadcrumb')
  @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Frames', 'url' => 'frames']]])
@endsection

  @section('pagination')
    @widget('Bowling.Widgets.Admin.Pagination', [], $frames)
  @endsection

  @section('filters')
  <p>Pas de filtres disponibles</p>
  <br />
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg btn-block" href="{{route('admin::frames.create')}}">Ajouter une entité</a>
    </div>
  </div>
  @endsection


  @section('table')
    <thead>
      <tr>
        <th>
          Id
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($frames as $frame)
      <tr>
        <td>
          {{$frame->id}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::frames.show', ['id' => $frame->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  @endsection
