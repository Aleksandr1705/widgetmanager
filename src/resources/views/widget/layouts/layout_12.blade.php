@extends('almosoft::widget.layouts.base.layoutbase')
@section('almosoftwidgetboard')
<div class="row">
    <div class="col-md-12">
      @foreach($widgetboard->widgets as $widget)
            @if($widget->pivot->col==0)
                {!! $widget->View !!}
            @endif
        @endforeach
    </div>
</div>
@endsection