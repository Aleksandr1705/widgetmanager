@extends('backpack::layout')
@section('after_scripts')
    <script src="{{ asset('vendor/almosoft') }}/widgetmanager/main.js"></script>
    
@endsection
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')    
{!! widgetmanager::GetWidgetBoard('system widgetboard') !!}
@endsection
