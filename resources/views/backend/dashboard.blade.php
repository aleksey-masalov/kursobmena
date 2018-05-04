@extends('backend.layout.app')

@section('title', trans('labels.backend.dashboard.title'))

@section('header')
    <h1>
        <i class="fa fa-dashboard"></i>
        {{ trans('labels.backend.dashboard.title') }}
        <small>{{ trans('labels.backend.dashboard.description') }}</small>
    </h1>
@endsection

@section('content')

@endsection
