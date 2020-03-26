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

Add repository path to composer.json file

```
"repositories": {
    "eburonmedia/ecma-core": {
        "type": "vcs",
        "url": "https://github.com/eburonmedia/EcmaCore"
    }
}
```

Install the core package

``` bash
$ composer require eburonmedia/ecma-core --dev
```

Load the migrations

``` bash
$ php artisan migrate
```

Vendor publish the config file and the assets

``` bash
$ php artisan vendor:publish
```

## User trait

Add the user trait to the user model and import the class and add the required id properties

```
use EcmaUsersTrait;

protected $keyType = 'string';
public $incrementing = false;
```

## Maintenance middleware

For using the maintenance mode you will have to add the included middleware to your routes

```
ecma.maintenance
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

[link-author]: https://github.com/eburonmedia

