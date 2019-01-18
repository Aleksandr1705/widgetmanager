# widgetmanager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Simple widget manager for backpackforlaravel. 

## Installation

Via Composer

``` bash
$ composer require almosoft/widgetmanager
$ php artisan migrate
$ php artisan db:seed --class=almosoft\widgetmanager\database\seeds\WidgetLayoutsSeeder
```
## Manual Installation
* Add menus to sidebar:
``` bash
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widget') }}'><i class='fa fa-tag'></i> <span>Widgets</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetlayout') }}'><i class='fa fa-tag'></i> <span>Widget Layouts</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboard') }}'><i class='fa fa-tag'></i> <span>Widgetboards</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboardwidget') }}'><i class='fa fa-tag'></i> <span>Widgetboard-widgets</span></a></li>"
```

* Publish WidgetBodyController controller:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.widgetbodycontroller"
```

* Publish assets:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.assets"
```

* Publish config (optionally):
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.config"
```

* Publish views (optionally):
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.views"
```

## Usage

Add asset to dashboard view (resources/views/vendor/backpack/base/dashboard.blade.php) after line: @extends('backpack::layout')
``` html
@section('after_scripts')
    <script src="{{ asset('vendor/almosoft') }}/widgetmanager/main.js"></script>    
@endsection
```
If the file is missing, you need to publish it from backpackforlaravel:
``` bash
php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag="minimum"
```

Add widgetboard to dashboard view:
``` bash
{!! widgetmanager::GetWidgetBoard('widgetboard name') !!}
```

Add single widget:
``` bash
{!! widgetmanager::GetWidget('widget name') !!}
```

* Add widgets;
* Add widgetboards;
* Add widgets to widgetboard;
* Add functions for widgets in WidgetBodyController, which returns body of widget;

## Note

> AdminLTE has error with box-refresh as described in [AdminLTE issue 1976](https://github.com/almasaeed2010/AdminLTE/issues/1976),
> but not fixed in version 2.4.8 yet. 
> Fixed file [adminlte.min.js](https://github.com/Aleksandr1705/widgetmanager/blob/master/src/public/vendor/adminlte/dist/js/adminlte.min.js) 
> copy to your public\vendor\adminlte\dist\js\.


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash

```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Aleksandr][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/almosoft/widgetmanager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/almosoft/widgetmanager.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/almosoft/widgetmanager/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/almosoft/widgetmanager
[link-downloads]: https://packagist.org/packages/almosoft/widgetmanager
[link-travis]: https://travis-ci.org/almosoft/widgetmanager
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/almosoft
[link-contributors]: ../../contributors]
