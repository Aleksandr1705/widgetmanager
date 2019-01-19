<?php

namespace almosoft\widgetmanager\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Backpack\CRUD\CrudTrait;

class WidgetboardWidget extends Pivot {

    use CrudTrait;

    /*
      |--------------------------------------------------------------------------
      | GLOBAL VARIABLES
      |--------------------------------------------------------------------------
     */

    protected $table = 'widgetboard_widgets';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['widget_id', 'widgetboard_id', 'col', 'position'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
      |--------------------------------------------------------------------------
      | FUNCTIONS
      |--------------------------------------------------------------------------
     */

    /*
      |--------------------------------------------------------------------------
      | RELATIONS
      |--------------------------------------------------------------------------
     */

    public function widgetboard() {
        return $this->belongsTo("almosoft\widgetmanager\Models\Widgetboard");
    }

    public function widget() {
        return $this->belongsTo("almosoft\widgetmanager\Models\Widget");
    }

    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */

    /*
      |--------------------------------------------------------------------------
      | ACCESORS
      |--------------------------------------------------------------------------
     */

    public function getViewAttribute() {
        $widget = $this->widget;
        $widgetboardwidget=$this;
        return view('almosoft::widget.widget', compact('widget','widgetboardwidget'));
    }

    /*
      |--------------------------------------------------------------------------
      | MUTATORS
      |--------------------------------------------------------------------------
     */
}
