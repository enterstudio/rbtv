Final steps for development environment
=======================================

## Add demo fixtures
``` bash
$ php app/console doctrine:fixtures:load
```

## Assets / Assetic
``` bash
$ php app/console cache:clear
```

``` bash
$ php app/console assets:install
```

``` bash
$ php app/console assetic:dump
```

## Fix permissions
``` bash
$ chmod -R 777 app/cache/
```

``` bash
$ chmod -R 777 app/logs/
```