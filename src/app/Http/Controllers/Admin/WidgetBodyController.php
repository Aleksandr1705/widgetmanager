<?php

namespace almosoft\widgetmanager\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use almosoft\widgetmanager\Models\Widget;

class WidgetBodyController extends Controller
{
    //
    public function getBody(Widget $widget){
        $body="";
        switch($widget->id){
            case 0:
                break;
            case 1:
                $body="w1";
                break;
            case 2:
                $body="w2";
                break;
        }
        return $body;
    }
}
