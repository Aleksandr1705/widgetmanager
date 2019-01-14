<?php
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    
    Route::get('widgetbody/{widget}','WidgetBodyController@getBody');
    Route::get('widgetmainpage',function(){
        return widgetmanager::getWidgetMainPage();
    });
    
});
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'almosoft\widgetmanager\app\Http\Controllers\Admin',
], function () { // custom admin routes
    
    CRUD::resource('widget','WidgetCrudController');
    CRUD::resource('widgetboard','WidgetboardCrudController');
    CRUD::resource('widgetlayout','WidgetlayoutCrudController');
    CRUD::resource('widgetboardwidget','WidgetboardWidgetCrudController');
     
}); // this should be the absolute last line of this file
