@extends('admin.layouts.page')

@section('page-title', 'Players')

@section('title')
Players : ajout d'une entité
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Players', 'url' => route('admin::users.index')]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($user, ['route' => ['admin::users.store'], 'method' => 'POST', 'files' => true]) !!}

              @include('admin.user._form', ['submitText' => 'Ajouter'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
