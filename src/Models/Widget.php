<?php

namespace almosoft\widgetmanager\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use almosoft\widgetmanager\app\Http\Controllers\Admin\WidgetBaseController;

class Widget extends Model {

    use CrudTrait;

    /*
      |--------------------------------------------------------------------------
      | GLOBAL VARIABLES
      |--------------------------------------------------------------------------
     */

    protected $table = 'widgets';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'title', 'descr', 'img', 'func', 'nopadding', 'wstatic','body_classes'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
     * Widget Footers, BodyFunction+Footer
     */


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
    public function widgetboardWidget() {
        return $this->hasMany("almosoft\widgetmanager\Models\WidgetboardWidget");
    }

    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */

    public function widgetByCol($query, $widgetboard_id, $col) {
        return $query->where('col', $col)->where('widgetboard_id', $widgetboard_id);
    }

    /*
      |--------------------------------------------------------------------------
      | ACCESORS
      |--------------------------------------------------------------------------
     */

    public function getViewAttribute() {
        $widget = $this;
        if ($this->wstatic) {
            return view('almosoft::widget.widget', compact('widget'));
        } else {
            return view('almosoft::widget.staticwidget', compact('widget'));
        }
    }

    public function getPaddingAttribute() {
        if ($this->nopadding) {
            return 'no-padding';
        } else {
            return '';
        }
    }
    public function getBodyAttribute() {
        $Method = $this->func;
        $BodyController = \App::make('App\Http\Controllers\Admin\WidgetBodyController');
        $bodyAll = "";
        if (method_exists($BodyController, $Method)) {
            $body = $BodyController->$Method($this);
            if ($body) {
                $bodyAll = $body;
            } else {
                $bodyAll = "";
            }
        }
        return $bodyAll;
    }
    public function getFooterAttribute() {
        $footerMethod = $this->func . "Footer";
        $BodyController = \App::make('App\Http\Controllers\Admin\WidgetBodyController');
        $footerAll = "";
        if (method_exists($BodyController, $footerMethod)) {
            $footer = $BodyController->$footerMethod($this);
            if ($footer) {
                $footerAll = "<div class='box-footer'>" . $footer . "</div>";
            } else {
                $footerAll = "";
            }
        }
        return $footerAll;
    }

    /*
      |--------------------------------------------------------------------------
      | MUTATORS
      |--------------------------------------------------------------------------
     */

    public function setImgAttribute($value) {
        $attribute_name = "img";
        $disk = config('widgetmanager.disk', 'public');
        $destination_path = "widgets";

        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image')) {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);
            $image->resize(100, 100);
            // 1. Generate a filename.
            $filename = md5($value . time()) . '.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
        }
    }

}
