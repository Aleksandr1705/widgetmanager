$(function () {
    Widgetmanager.reinit();
});
function Widgetmanager() {

}
;
Widgetmanager.addWidgetToWidgetboard = function (widgetboard_id, widget_id) {
    $("#myModal").modal('hide');
    $.ajax({
        url: $('#widgetapiurl').val(),
        data: {
            action: 'addWidgetToWidgetboard',
            widgetboard_id: widgetboard_id,
            widget_id: widget_id
        },
        success: function () {
            new PNotify({
                text: 'Widget added successfully',
                type: 'success'
            });
            Widgetmanager.refreshWidgetboard();
            

        },
        error: function () {
            new PNotify({
                text: 'Error',
                type: 'error'
            });
        }
    });
};

Widgetmanager.deleteWidgetFromWidgetboard = function (widgetboardwidget_id) {
    $("#myModal").modal('hide');
    $.ajax({
        url: $('#widgetapiurl').val(),
        data: {
            action: 'deleteWidgetFromWidgetboard',
            widgetboardwidget_id: widgetboardwidget_id,
        },
        success: function () {
            new PNotify({
                text: 'Widget deleted successfully',
                type: 'success'
            });
            Widgetmanager.savePosition();
        },
        error: function () {
            new PNotify({
                text: 'Error',
                type: 'error'
            });

        }
    });
};
Widgetmanager.refreshWidgetboard = function () {
    $.ajax({
        url: $('#widgetmainpage').val(),
        success: function (response) {
            $("#widgetboard").html(response);
            $("[name='widget']").boxWidget();
            $("[name='staticwidget']").boxWidget();
            $("[name='widget']").boxRefresh('load');
            Widgetmanager.reinit();
            Widgetmanager.savePosition();
        },
        error: function () {
            new PNotify({
                text: 'Error',
                type: 'error'
            });

        }
    });
};
Widgetmanager.reinit = function () {
    $("[name='widget']").on('removed.boxwidget', function (e) {
        Widgetmanager.deleteWidgetFromWidgetboard($(e.target).data('pivot_id'));
    });
    $("[name='staticwidget']").on('removed.boxwidget', function (e) {
        Widgetmanager.deleteWidgetFromWidgetboard($(e.target).data('pivot_id'));
    });
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.box-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999,
        stop:function(event,ui){
            Widgetmanager.savePosition();
        }
    });
    $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');
    
};
Widgetmanager.savePosition=function(){
    var widgets=[];
    var widget={};
    var sortable=$(".connectedSortable");
    $(sortable).each(function(column){
        $(this).find('.box').each(function(position){
            widget={
                column:column,
                position:position,
                widgetboardwidget_id:$(this).data('pivot_id')
            };
            widgets.push(widget);            
        });
        
    });;
    if(widgets.length>0){
        $.ajax({
        url: $('#widgetapiurl').val(),
        data: {
            action: 'saveWidgetPositions',
            widgets:widgets
        },
        success: function () {
        },
        error: function () {
            new PNotify({
                text: 'Error',
                type: 'error'
            });

        }
    });
    }
};