@extends('admin.layouts.page')

@section('page-title', 'Players')

@section('title')
Players: {{$user->id}}
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Players', 'url' => route('admin::users.index')], ['text' => $user->id, 'url' => route('admin::users.show', ['id' => $user->id])]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($user, ['route' => ['admin::users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

              @include('admin.user._form', ['submitText' => 'Modifier'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      {!! Form::open(['method' => 'delete', 'route' => ['admin::users.destroy', $user->id], 'data-confirm' => 'Delete']) !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']); !!}
      {!! Form::close() !!}
      </form>
    </div>
  </div>

@endsection
