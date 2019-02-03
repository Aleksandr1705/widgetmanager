<?php

namespace almosoft\widgetmanager;

use almosoft\widgetmanager\Models\Widgetboard;
use almosoft\widgetmanager\Models\Widget;
use almosoft\widgetmanager\Models\WidgetboardWidget;

class widgetmanager {

    // Build wonderful things
    public function test() {
        return true;
    }

    
    
    public function getWidgetBoard($name) {
        $widgetboard = Widgetboard::where('name',$name)->first();
        if ($widgetboard) {
            $widgets=Widget::get();
            $widgetlayout = $widgetboard->widgetlayout;
            $widgetboardwidgets= WidgetboardWidget::where('widgetboard_id',$widgetboard->id)->orderBy('position','asc')->get();
            if ($widgetlayout) {
                return view("almosoft::widget.layouts." . $widgetlayout->fname, compact('widgetboard','widgetboardwidgets','widgets'));
            } else {
                return 'The layout not selected for widgetboard';
            }
        } else {
            return "The dashboards with name $name is absent";
        }
    }

//    public function getWidget($name){
//        $widget= Widget::where('name',$name)->first();
//        if($widget){
//            if($widget->wstatic){
//                return view("almosoft::widget.staticwidget",compact('widget'));
//                
//            }else{
//                return view("almosoft::widget.widget",compact('widget'));
//            }
//        }else{
//            return "The widget with name $name is absent";
//        }
//    }
    
    public function getWidgetMainPage(){
        return view("almosoft::widget.widgetmainpage");
    }
    
    
    
}
