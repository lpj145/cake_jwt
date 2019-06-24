# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

````bash
git clone https://github.com/lpj145/cake_jwt.git my_app
cd my_app
composer update
````

## Configure Env Vars
Configure a database by env on config/.env or config/app.php file.

## Migrations migrate
```bash
bin/cake migrations migrate
```

###Add first user
```bash
bin/cake create_user *name *lastname *username *password *phone ?role
```
phone on future needed to  2fa implemented by nexmo.

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

##Login
On curl or other http client try ``POST`` to ``/api/login`` to obtain
```json
{
    "token_type": "bearer",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOnsiaWQiOiI4MzhkOTYyOC0xNGRiLTRmYTItYjZjMy0wMDU4NDk2ZDBlMTMiLCJyb2xlIjoidXNlciIsImFjdGl2ZSI6dHJ1ZX0sImV4cCI6MTU2MTQwNTUxNX0.TNRQbP2CllUgX58Fl-OI18CFl0QA_q8T8FZT7EgwrOg",
    "token_expire": 1561405515,
    "data": {
        "id": "838d9628-14db-4fa2-b6c3-0058496d0e13",
        "name": "Marcos",
        "lastname": "Dantas",
        "role": "user"
    }
}
```

###Login with jwt
Try with http client, set ``Authorization`` header with ``Bearer ${token}`` ``POST`` to ``/api/ping``

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.
