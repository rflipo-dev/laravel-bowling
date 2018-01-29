
@extends('admin.layouts.starter')

@section('page')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @yield('title')
  </h1>

  @yield('breadcrumb')
</section>

<!-- Main content -->
<section class="content">
  @if(Session::has('status'))
  <div class="alert alert-success">
    <span>{{ Session::get('status') }}</span>
      <button id="closeBtn" class="btn-close icon-gd-close"></button>
  </div>
  @endif
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
      <button id="closeBtn" class="btn-close icon-gd-close"></button>
  </div>
  @endif
  <!-- Your Page Content Here -->
  @yield('content')
</section>
<!-- /.content -->
@endsection
