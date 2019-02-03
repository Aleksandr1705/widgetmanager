<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use almosoft\widgetmanager\Http\Requests\WidgetboardRequest as StoreRequest;
use almosoft\widgetmanager\Http\Requests\WidgetboardRequest as UpdateRequest;

/**
 * Class WidgetboardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class WidgetboardCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('almosoft\widgetmanager\Models\Widgetboard');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widgetboard');
        $this->crud->setEntityNameStrings('widgetboard', 'widgetboards');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->setColumns([
            [
                'name'=>'name',
                'label'=>'Name'
            ],
            [
                'name'=>'widgetlayout_id',
                'label'=>'Layout',
                'type'=>'select',
                'entity'=>'widgetlayout',
                'attribute'=>'name',
                'model'=>'almosoft\widgetmanager\Models\widgetlayout'
            ]
        ]);
        $this->crud->addFields([
            [
                'name'=>'name',
                'label'=>'Name'
            ],
            [
                'name'=>'widgetlayout_id',
                'label'=>'Layout',
                'type'=>'select',
                'entity'=>'widgetlayout',
                'attribute'=>'name',
                'model'=>'almosoft\widgetmanager\Models\widgetlayout'
            ]
        ]);
        // add asterisk for fields that are required in WidgetboardRequest
        //$this->crud->setRequiredFields(StoreRequest::class, 'create');
        //$this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
