<?php

namespace almosoft\widgetmanager\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use almosoft\widgetmanager\Http\Requests\WidgetlayoutRequest as StoreRequest;
use almosoft\widgetmanager\Http\Requests\WidgetlayoutRequest as UpdateRequest;

/**
 * Class WidgetlayoutCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class WidgetlayoutCrudController extends CrudController {

    public function setup() {
        /*
          |--------------------------------------------------------------------------
          | CrudPanel Basic Information
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel('almosoft\widgetmanager\Models\Widgetlayout');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widgetlayout');
        $this->crud->setEntityNameStrings(trans('almosoft::base.Layout'), trans('almosoft::base.Widgetboard_Layouts'));

        /*
          |--------------------------------------------------------------------------
          | CrudPanel Configuration
          |--------------------------------------------------------------------------
         */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => trans('almosoft::base.Name')
            ],
            [
                'name' => 'fname',
                'label' => trans('almosoft::base.Fname')
            ]
        ]);
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => trans('almosoft::base.Name')
            ],
            [
                'name' => 'fname',
                'label' => trans('almosoft::base.Fname')
            ]
        ]);
        
        // add asterisk for fields that are required in WidgetlayoutRequest
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
