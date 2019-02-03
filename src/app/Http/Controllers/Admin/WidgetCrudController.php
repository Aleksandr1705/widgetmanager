<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use almosoft\widgetmanager\Http\Requests\WidgetRequest as StoreRequest;
use almosoft\widgetmanager\Http\Requests\WidgetRequest as UpdateRequest;

/**
 * Class WidgetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class WidgetCrudController extends CrudController {

    public function setup() {
        /*
          |--------------------------------------------------------------------------
          | CrudPanel Basic Information
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel('almosoft\widgetmanager\Models\Widget');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widget');
        $this->crud->setEntityNameStrings(trans('almosoft::base.Widget'), trans('almosoft::base.Widgets'));

        /*
          |--------------------------------------------------------------------------
          | CrudPanel Configuration
          |--------------------------------------------------------------------------
         */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => trans('almosoft::base.Name')
            ],
            [
                'name' => 'title',
                'label' => trans('almosoft::base.Title')
            ],
            [
                'name' => 'descr',
                'label' => trans('almosoft::base.Description'),
                'required' => true
            ],
            [
                'name' => 'nopadding',
                'label' => trans('almosoft::base.No_padding'),
                'type' => 'checkbox'
            ],
            [
                'name' => 'wstatic',
                'label' => trans('almosoft::base.Static'),
                'type' => 'checkbox',
                'hint'=>trans('almosoft::base.Static_hint')
            ],
            [
                'name' => 'body_classes',
                'label' => trans('almosoft::base.Body_classes')
            ],
            [
                'name' => 'func',
                'label' => trans('almosoft::base.Function_name'),
                'hint' => trans('almosoft::base.Function_name_hint')
            ],
            [
                'name' => 'img',
                'label' => trans('almosoft::base.Image'),
                'type' => 'image',
                'upload' => true,
                'crop' => true,
                'prefix' => config('widgetmanager.storage_prefix', 'storage/'),
                'aspect_ratio' => 1
            ]
        ]);

        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => trans('almosoft::base.Name')
            ],
            [
                'name' => 'title',
                'label' => trans('almosoft::base.Title')
            ],
            [
                'name' => 'descr',
                'label' => trans('almosoft::base.Description'),
            ],
            [
                'name' => 'nopadding',
                'label' => trans('almosoft::base.No_padding'),
                'type' => 'check'
            ],
            [
                'name' => 'wstatic',
                'label' => trans('almosoft::base.Static'),
                'type' => 'check'
            ],
            [
                'name' => 'body_classes',
                'label' => trans('almosoft::base.Body_classes')
            ],
            [
                'name' => 'func',
                'label' =>  trans('almosoft::base.Function_name'),
            ],
            [
                'name' => 'img',
                'label' => trans('almosoft::base.Image'),
                'type' => 'image',
                'upload' => true,
                'crop' => true,
                'prefix' => config('widgetmanager.storage_prefix', 'storage/'),
                'aspect_ratio' => 1
            ]
        ]);
        // add asterisk for fields that are required in WidgetRequest
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
