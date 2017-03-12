Final steps for production environment
======================================

## Increase Performance
``` bash
$ composer dump-autoload --optimize
```

If you are using ``APC`` you can activate it by
uncomment the lines 12-16 in ``web/app.php``.


## Assets / Assetic
``` bash
$ php app/console cache:clear --env=prod --no-debug
```

``` bash
$ php app/console assets:install --env=prod --no-debug
```

``` bash
$ php app/console assetic:dump --env=prod --no-debug
```

## Fix permissions
``` bash
$ chmod -R 777 app/cache/
```

``` bash
$ chmod -R 777 app/logs/
```