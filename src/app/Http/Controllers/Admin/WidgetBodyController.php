<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use almosoft\widgetmanager\Models\Widget;
use almosoft\widgetmanager\app\Http\Controllers\Admin\WidgetBaseController;


class WidgetBodyController extends WidgetBaseController {

    //
    

    //Add here your widgets methods
    public function Widget1(){
        return "hello world!";
    }
}
