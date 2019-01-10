<?php

namespace almosoft\widgetmanager\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

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
    protected $fillable = ['name', 'descr', 'img'];

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

    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */

    public function widgetByCol($query,$widgetboard_id,$col){
        return $query->where('col',$col)->where('widgetboard_id',$widgetboard_id);
    }
    /*
      |--------------------------------------------------------------------------
      | ACCESORS
      |--------------------------------------------------------------------------
     */
    public function getViewAttribute(){
        $widget=$this;
        return view('almosoft::widget.widget',compact('widget'));
    }
    
    /*
      |--------------------------------------------------------------------------
      | MUTATORS
      |--------------------------------------------------------------------------
     */
    public function setImgAttribute($value) {
        $attribute_name = "img";
        $disk = "public";
        $destination_path = "uploads/widgets";

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
            // 1. Generate a filename.
            $filename = md5($value . time()) . '.jpg';
            
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
        }
    }

}
