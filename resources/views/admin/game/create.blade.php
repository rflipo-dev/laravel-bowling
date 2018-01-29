@extends('admin.layouts.page')

@section('page-title', 'Games')

@section('title')
Games : ajout d'une entité
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Games', 'url' => route('admin::games.index')]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($game, ['route' => ['admin::games.store'], 'method' => 'POST', 'files' => true]) !!}

              @include('admin.game._form', ['submitText' => 'Ajouter'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
