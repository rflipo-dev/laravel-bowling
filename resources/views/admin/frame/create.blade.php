@extends('admin.layouts.page')

@section('page-title', 'Frames')

@section('title')
Frames : ajout d'une entité
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Frames', 'url' => route('admin::frames.index')]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($frame, ['route' => ['admin::frames.store'], 'method' => 'POST', 'files' => true]) !!}

              @include('admin.frame._form', ['submitText' => 'Ajouter'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
