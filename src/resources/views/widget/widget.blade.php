<div class = "box box-default" name="widget" data-pivot_id="{{ $widgetboardwidget->id }}" data-widget="box-refresh" id="widget{{$widget->id}}" data-id="{{$widget->id}}" data-source="widgetbody/{{ $widget->id }}">
    <div class = "box-header with-border ui-sortable-handle" style="cursor:move">
        <div>{{ $widget->title }}</div>
        <div class="box-tools pull-right">
            <!-- Remove Button -->
            <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class = "box-body {{ $widget->padding }} {{ $widget->body_classes }}"></div>  
    {!! $widget->footer !!}
</div>
