@extends('admin.layouts.page')

@section('page-title', 'Dashboard')

@section('title')
Dashboard <small>Bowling</small>
@endsection

@section('breadcrumb', '')

@section('content')

    <p class="lead">Bienvenue {{ $authUser->firstname }} {{ $authUser->lastname }}</p>

@endsection
