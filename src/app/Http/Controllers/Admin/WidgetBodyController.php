<?php

namespace almosoft\widgetmanager\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use almosoft\widgetmanager\Models\Widget;

class WidgetBodyController extends Controller
{
    //
    public function getBody(Widget $widget){
        switch($widget->id){
            case 0:
                break;
            case 1:
                break;
        }
        return "body";
    }
}
