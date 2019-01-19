@extends('almosoft::widget.layouts.base.layoutbase')
@section('almosoftwidgetboard')
<div class="row">
    <div class="col-md-5 connectedSortable ui-sortable">
        @foreach($widgetboardwidgets as $widgetboardwidget)
            @if($widgetboardwidget->col==0)
                {!! $widgetboardwidget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-5 connectedSortable ui-sortable">
        @foreach($widgetboardwidgets as $widgetboardwidget)
            @if($widgetboardwidget->col==1)
                {!! $widgetboardwidget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-2 connectedSortable ui-sortable">
        @foreach($widgetboardwidgets as $widgetboardwidget)
            @if($widgetboardwidget->col==2)
                {!! $widgetboardwidget->View !!}
            @endif
        @endforeach
    </div>
</div>
@endsection