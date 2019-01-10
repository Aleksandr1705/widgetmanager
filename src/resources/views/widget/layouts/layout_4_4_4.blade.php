<div class="row">
    <div class="col-md-4">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==0)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==1)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==2)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
</div>