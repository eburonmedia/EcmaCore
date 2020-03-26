# EcmaCore

This is the core package for Eburon.Media's Content Management Application.

## Usage

First install a fresh laravel application

``` bash
$ laravel new ApplicationName
```

Make the necessary changes to the User Migration and move the User modal to the Models Directory.
Reference the User to the new location in the Config => Auth.php

``` bash
$ cd ApplicationName
$ composer require laravel/ui
$ php artisan ui bootstrap --auth
```

Install the core package

``` bash
$ composer require-dev eburonmedia/ecma-core
```

Load the migrations

``` bash
$ php artisan migrate
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

[link-author]: https://github.com/eburonmedia

