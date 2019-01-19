<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Widgets</h4>
            </div>
            <div class="modal-body">
                @foreach($widgets as $widget)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            @if($widget->img)
                            <img style='border-radius: 5px' class="media-object" src="{{ asset((config('widgetmanager.storage_prefix','')) .$widget->img) }}" alt="{{ $widget->title }}">
                            @else
                            <div style='background-color:#ecf0f5;width:100px;height:100px;border-radius: 5px;'>
                            </div>
                            @endif
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $widget->title }}</h4>
                        {{ $widget->descr }}
                    </div>
                    <div class='media-footer pull-right'>
                        <button type="button" class="btn btn-default btn-xs" onclick="Widgetmanager.addWidgetToWidgetboard({{$widgetboard->id}},{{$widget->id}})">Add to widgetboard</button>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>