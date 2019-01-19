<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use almosoft\widgetmanager\Models\WidgetboardWidget;
use almosoft\widgetmanager\Models\Widgetboard;
use almosoft\widgetmanager\Models\Widget;

class WidgetBaseController extends Controller {

    //
    public function getBody(Widget $widget) {
        $body = "";
        $func = $widget->func;
        if (method_exists($this, $func)) {
            $body = $this->$func();
        } else {
            $body = "Method $func does not exists in WidgetBodyController";
        }
        return $body;
    }

    public function api(Request $request) {
        $action = $request->action;
        switch ($action) {
            case "addWidgetToWidgetboard":
                $widgetboard = Widgetboard::find($request->widgetboard_id);
                $widget = Widget::find($request->widget_id);
                $widgetboardwidgetposition = WidgetboardWidget::where('widgetboard_id', $widgetboard->id)->
                                where('col', 0)->max('position');
                $widgetboardwidget = new WidgetboardWidget();
                $widgetboardwidget->widgetboard_id = $widgetboard->id;
                $widgetboardwidget->widget_id = $widget->id;
                $widgetboardwidget->col = 0;
                $widgetboardwidget->position = $widgetboardwidgetposition + 1;
                $widgetboardwidget->save();
                break;
            case "deleteWidgetFromWidgetboard":
                $widgetboardwidget = WidgetboardWidget::find($request->widgetboardwidget_id);
                if ($widgetboardwidget) {
                    $widgetboardwidget->delete();
                }
            case "saveWidgetPositions":
                $widgets = $request->widgets;
                foreach ($widgets as $widget) {
                    \DB::table('widgetboard_widgets')->where('id', $widget['widgetboardwidget_id'])->update([
                        'col' => $widget['column'],
                        'position' => $widget['position']
                    ]);
                }
                break;
        }

        return "ok";
    }

}
