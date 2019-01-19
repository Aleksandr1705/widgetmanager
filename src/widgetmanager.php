<?php

namespace almosoft\widgetmanager;

use almosoft\widgetmanager\Models\Widgetboard;
use almosoft\widgetmanager\Models\Widget;

class widgetmanager {

    // Build wonderful things
    public function test() {
        return true;
    }

    
    
    public function getWidgetBoard($name) {
        $widgetboard = Widgetboard::where('name',$name)->first();
        $widgets=Widget::get();
        if ($widgetboard) {
            $widgetlayout = $widgetboard->widgetlayout;
            if ($widgetlayout) {
                return view("almosoft::widget.layouts." . $widgetlayout->fname, compact('widgetboard','widgets'));
            } else {
                return '';
            }
        } else {
            return "The dashboards with name $name is absent";
        }
    }

    public function getWidget($name){
        $widget= Widget::where('name',$name)->first();
        if($widget){
            return view("almosoft::widget.widget",compact('widget'));
        }else{
            return "The widget with name $name is absent";
        }
    }
    
    public function getWidgetMainPage(){
        return view("almosoft::widget.widgetmainpage");
    }
}
