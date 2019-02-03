<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use almosoft\widgetmanager\Http\Requests\WidgetboardWidgetRequest as StoreRequest;
use almosoft\widgetmanager\Http\Requests\WidgetboardWidgetRequest as UpdateRequest;

/**
 * Class WidgetboardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class WidgetboardWidgetCrudController extends CrudController {

    public function setup() {
        /*
          |--------------------------------------------------------------------------
          | CrudPanel Basic Information
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel('almosoft\widgetmanager\Models\WidgetboardWidget');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widgetboardwidget');
        $this->crud->setEntityNameStrings(trans('almosoft::base.Widgetboard'), trans('almosoft::base.Widgetboards'));

        /*
          |--------------------------------------------------------------------------
          | CrudPanel Configuration
          |--------------------------------------------------------------------------
         */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->setColumns([
            [
                'name' => 'widgetboard_id',
                'label' => trans('almosoft::base.Widgetboard'),
                'type' => 'select',
                'entity' => 'widgetboard',
                'attribute' => 'name',
                'model' => 'almosoft\widgetmanager\Models\Widgetboard'
            ],
            [
                'name' => 'widget_id',
                'label' => trans('almosoft::base.Widget'),
                'type' => 'select',
                'entity' => 'widget',
                'attribute' => 'name',
                'model' => 'almosoft\widgetmanager\Models\Widget'
            ],
            [
                'name' => 'col',
                'label' => trans('almosoft::base.Column'),
                'type' => 'number'
            ],
            [
                'name' => 'position',
                'label' => trans('almosoft::base.Position'),
                'type' => 'number'
            ]
        ]);
        $this->crud->addFields([
            [
                'name' => 'widgetboard_id',
                'label' => trans('almosoft::base.Widgetboard'),
                'type' => 'select',
                'entity' => 'widgetboard',
                'attribute' => 'name',
                'model' => 'almosoft\widgetmanager\Models\Widgetboard'
            ],
            [
                'name' => 'widget_id',
                'label' => trans('almosoft::base.Widget'),
                'type' => 'select',
                'entity' => 'widget',
                'attribute' => 'name',
                'model' => 'almosoft\widgetmanager\Models\Widget'
            ],
            [
                'name' => 'col',
                'label' => trans('almosoft::base.Column'),
                'type' => 'number',
                'default' => 0
            ],
            [
                'name' => 'position',
                'label' => trans('almosoft::base.Position'),
                'type' => 'number',
                'default' => 0
            ]
        ]);
        // add asterisk for fields that are required in WidgetboardRequest
        //$this->crud->setRequiredFields(StoreRequest::class, 'create');
        //$this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request) {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request) {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

}
