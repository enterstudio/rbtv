Getting Started With RBTV.info
==============================

## Prerequisites

This project requires:

* PHP >= 5.4
* PHP extension ``curl``

## Installation

1. Download and install composer.
3. Setup the configuration file.
4. Install everything.
5. Setup the database.
6. Final steps.

### Step 1: Download and install composer

* [Linux / Unix / MacOSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)

### Step 2: Setup the configuration file

Copy the sample configuration file ``app/config/parameters.yml.dist`` to ``app/config/parameters.yml``.
Change all needed configuration settings in ``parameters.yml``.

### Step 3: Install everything

Run this command in the root directory of the project.

* Production environment:
``` bash
$ php composer install --no-dev --optimize-autoloader
```
* Development environment:
``` bash
$ php composer install
```

### Step 4: Setup the database

Run this command in the root directory of the project:

``` bash
$ php doctrine:database:create
```
If you are not allowed to automatically create the database you need to create it manually.
The database collation should be ``utf8_bin``.

Now create the database tables:

``` bash
$ php doctrine:schema:create
```

### Step 5: Final step

Based on the environment you need to do some final steps:

* [Production environment](final_steps.prod.md)
* [Development environment](final_steps.dev.md)

## Have fun.

:-)