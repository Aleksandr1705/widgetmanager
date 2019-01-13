# widgetmanager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Widget manager for backpackforlaravel.

## Installation

Via Composer

``` bash
$ composer require almosoft/widgetmanager
$ php artisan migrate
$ php artisan db:seed --class=almosoft\widgetmanager\database\seeds\WidgetLayoutsSeeder
```

## Usage

Add to your dashboard view:
``` bash
{!! widgetmanager::GetWidgetBoard() !!}
```
Add to menus to sidebar:
``` bash
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widget') }}'><i class='fa fa-tag'></i> <span>Widgets</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetlayout') }}'><i class='fa fa-tag'></i> <span>Widget Layouts</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboard') }}'><i class='fa fa-tag'></i> <span>Widgetboards</span></a></li>"
php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url('widgetboardwidget') }}'><i class='fa fa-tag'></i> <span>Widgetboard-widgets</span></a></li>"

```

Publish controller:
``` bash
php artisan vendor:publish --provider="almosoft\widgetmanager\widgetmanagerServiceProvider" --tag="widgetmanager.widgetbodycontroller"
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

- [author name][link-author]
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
