@extends('admin.layouts.page')

@section('page-title', 'Launches')

@section('title')
Launches : ajout d'une entité
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Launches', 'url' => route('admin::launches.index')]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($launch, ['route' => ['admin::launches.store'], 'method' => 'POST', 'files' => true]) !!}

              @include('admin.launch._form', ['submitText' => 'Ajouter'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
