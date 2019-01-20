# widgetmanager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Simple widget manager for [backpackforlaravel][link-backpackforlaravel]. 

[Image](https://github.com/Aleksandr1705/images/blob/master/widgetmanager.PNG)

## Installation

Via Composer

``` bash
composer require almosoft/widgetmanager
php artisan almosoft:widgetmanager:install
```
During installation your current dashboard view will be replaced with standard dashboard view from backpack. 

After install you need to fix adminlte js. [Adminlte fix](#important)

## Manual Installation
``` bash
composer require almosoft/widgetmanager
php artisan migrate
php artisan db:seed --class=almosoft\widgetmanager\database\seeds\WidgetLayoutsSeeder
```
* Add menus to sidebar:
``` bash
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widget') }}'><i class='fa fa-square-o'></i> <span>Widgets</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetlayout') }}'><i class='fa fa-square-o'></i> <span>Widgetboard Layouts</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboard') }}'><i class='fa fa-square-o'></i> <span>Widgetboards</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboardwidget') }}'><i class='fa fa-square-o'></i> <span>Widgetboard-widgets</span></a></li>"
```

* Publish WidgetBodyController controller:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.widgetbodycontroller"
```

* Publish assets:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.assets"
```

* Publish config:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.config"
```

* Publish views (optionally):
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.views"
```

## Usage

Add widgetboard to dashboard view (resources/views/vendor/backpack/base/dashboard.blade.php)

``` bash
<div id="widgetboard">
    {!! widgetmanager::GetWidgetBoard('system widgetboard') !!}
</div>
```

Or single widget:
``` bash
{!! widgetmanager::GetWidget('widget name') !!}
```

If dashboard view is missing, you need to publish it from backpackforlaravel:
``` bash
php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag="views"
```



* Add widgets from Widgets menu;

If image is not showing, probabaly you need to create storage link:
``` bash
php artisan storage:link
```

* Add functions for widgets in WidgetBodyController, which returns body of widget;
* Add widgets to widgetboard from main dashboard;

## Important

> AdminLTE has error with box-refresh as described in [AdminLTE issue 1976](https://github.com/almasaeed2010/AdminLTE/issues/1976),
> but not fixed in version 2.4.8 yet. 
> Fixed file [adminlte.js](https://github.com/Aleksandr1705/widgetmanager/blob/master/src/public/vendor/adminlte/dist/js/adminlte.js) 
> copy to your public\vendor\adminlte\dist\js\ directory.
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.adminltefix" --force
```

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
[link-author]: https://github.com/Aleksandr1705
[link-contributors]: ../../contributors

[link-backpackforlaravel]: https://backpackforlaravel.com
