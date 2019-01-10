<div class="row">
    <div class="col-md-5">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==0)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-5">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==1)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
    <div class="col-md-2">
        @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==2)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
</div>