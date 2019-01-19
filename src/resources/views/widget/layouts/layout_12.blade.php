@extends('almosoft::widget.layouts.base.layoutbase')
@section('almosoftwidgetboard')
<div class="row">
    <div class="col-md-12 connectedSortable ui-sortable">
        @foreach($widgetboardwidgets as $widgetboardwidget)
            @if($widgetboardwidget->col==0)
                {!! $widgetboardwidget->View !!}
            @endif
        @endforeach
    </div>
</div>
@endsection