@extends('admin.layouts.page')

@section('page-title', 'Games')

@section('title')
Games: {{$game->id}}
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Games', 'url' => route('admin::games.index')], ['text' => $game->id, 'url' => route('admin::games.show', ['id' => $game->id])]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($game, ['route' => ['admin::games.update', $game->id], 'method' => 'PUT', 'files' => true]) !!}

              @include('admin.game._form', ['submitText' => 'Modifier'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      {!! Form::open(['method' => 'delete', 'route' => ['admin::games.destroy', $game->id], 'data-confirm' => 'Delete']) !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']); !!}
      {!! Form::close() !!}
      </form>
    </div>
  </div>

@endsection
