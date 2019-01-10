<?php

namespace almosoft\widgetmanager;
use almosoft\widgetmanager\Models\Widgetboard;


class widgetmanager
{
    // Build wonderful things
    public function test(){
        return true;
    }
    
    public function getWidgetBoard(){
        $widgetboard= Widgetboard::first();
        $widgetlayout=$widgetboard->widgetlayout;
        if($widgetlayout){
            return view("almosoft::widget.layouts.".$widgetlayout->fname,compact('widgetboard'));
        }else{
            return '';
        }
    }
}