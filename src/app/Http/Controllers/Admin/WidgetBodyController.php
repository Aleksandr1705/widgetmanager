<?php

namespace almosoft\widgetmanager\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use almosoft\widgetmanager\Models\Widget;

class WidgetBodyController extends Controller {

    //
    public function getBody(Widget $widget) {
        $body = "";
        $func = $widget->func;
        if (method_exists($this, $func)) {
            $body = $this->$func();
        }else{
            $body="Method $func does not exists in WidgetBodyController";
        }
        return $body;
    }

    //Add here your widgets methods

}
