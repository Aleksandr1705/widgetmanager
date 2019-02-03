@section('after_scripts')
@parent
<script src="{{ asset('vendor/adminlte/bower_components/jquery-ui') }}/jquery-ui.min.js"></script>
<script src="{{ asset('vendor/almosoft') }}/widgetmanager/widgetmanager.js"></script>    
@endsection
<input type="hidden" id="widgetapiurl" value="{{ route('widgetapi') }}" />
<input type="hidden" id="widgetmainpage" value="{{ route('widgetmainpage') }}" />
<div class='row'>
    <div class='col-md-12'>
        <div class='pull-right' style='margin-bottom: 10px'>
            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Add widget</button>
        </div>
    </div>
</div>
@include('almosoft::widget.layouts.base.modals')

@yield('almosoftwidgetboard')