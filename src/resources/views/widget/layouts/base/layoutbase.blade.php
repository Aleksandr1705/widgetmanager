@section('after_scripts')
<script src="{{ asset('vendor/almosoft') }}/widgetmanager/widgetmanager.js"></script>    
@endsection
<div class='row'>
    <div class='col-md-12'>
        <div class='pull-right' style='margin-bottom: 10px'>
            <button type="button" class="btn btn-primary btn-xs">Add widget</button>
        </div>
    </div>
</div>
@yield('almosoftwidgetboard')