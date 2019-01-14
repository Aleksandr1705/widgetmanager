<?php

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'almosoft\widgetmanager\app\Http\Controllers\Admin',
], function () { // custom admin routes
    
    CRUD::resource('widget','WidgetCrudController');
    CRUD::resource('widgetboard','WidgetboardCrudController');
    CRUD::resource('widgetlayout','WidgetlayoutCrudController');
    CRUD::resource('widgetboardwidget','WidgetboardWidgetCrudController');
    
    Route::get('widgetbody/{widget}','WidgetBodyController@getBody');
    Route::get('widgetmainpage','WidgetMainPageController@index');
    
}); // this should be the absolute last line of this file
