<?php

namespace almosoft\widgetmanager\Http\Controllers\Admin;

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
        $this->crud->setEntityNameStrings('widget', 'widgets');

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
                'label' => 'Name'
            ],
            [
                'name' => 'title',
                'label' => 'Title'
            ],
            [
                'name' => 'descr',
                'label' => 'Description',
                'required' => true
            ],
            [
                'name' => 'func',
                'label' => 'Function name',
                'hint' => 'Function name (without spaces) for widget function in WidgetBodyController'
            ],
            [
                'name' => 'img',
                'label' => 'Image',
                'type' => 'image',
                'upload' => true,
                'crop' => true,
                'prefix' => 'storage/'
            ]
        ]);

        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Name'
            ],
            [
                'name' => 'title',
                'label' => 'Title'
            ],
            [
                'name' => 'descr',
                'label' => 'Description'
            ],
            [
                'name' => 'func',
                'label' => 'Function name'
            ],
            [
                'name' => 'img',
                'label' => 'Image',
                'type' => 'image',
                'upload' => true,
                'crop' => true,
                'prefix' => 'storage/'
            ]
        ]);
        // add asterisk for fields that are required in WidgetRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
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
