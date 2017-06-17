#Laravel 5 - Validação em Português

Essa é uma biblioteca com algumas validações brasileiras.

[![Build Status](https://travis-ci.org/LaravelLegends/pt-br-validator.svg?branch=master)](https://travis-ci.org/LaravelLegends/pt-br-validator)

#Instalação

No arquivo `composer.json`, adicione:

```json
{
	"laravellegends/pt-br-validator" : "5.1.*"
}
```

Rode o comando `composer update --no-scripts`.

Após a instalação, adicione no arquivo `config/app.php` a seguinte linha:

```php

LaravelLegends\PtBrValidator\ValidatorProvider::class

```

Para utilizar a validação agora, basta fazer o procedimento padrão do `Laravel`.

A diferença é que agora, você terá os seguintes métodos de validação:

* celular - Valida um celular através do formato 99999-9999 ou 9999-9999

* celular_com_ddd -  Valida um celular através do formato (99)99999-9999 ou (99)9999-9999

* cnpj - Valida se o CNPJ é valido. Para testar, basta utilizar o site http://www.geradorcnpj.com/

* cpf - Valida se o cpf é valido. Para testar, basta utilizar o site http://geradordecpf.
org

* data - Valida se a data está no formato 31/12/1969

* formato_cnpj - Valida se a mascará do CNPJ é válida

* formato_cpf - Valida se a mascará do cpf está certo. 999.999.999-99

* telefone - Valida um telefone através do formato 9999-9999

* telefone_com_ddd - Valida um telefone através do formato (99)9999-9999


Então, podemos usar um simples teste:


```php
$validator = Validator::make(
	['telefone' => '(77)9999-3333'],
	['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```


Já existe nessa biblioteca algumas mensagens padrão para as validações de cada um dos items citados acima. 

Para modificar isso, basta adicionar ao terceiro parâmetro de `Validator::make` um array, contendo o índice com o nome da validação e o valor com a mensagem desejada.


Exemplo:


```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```




# The Mask

A lightweight (2KB gzipped) and dependency free mask input created specific for Vue.js

## [Docs and Demo](https://vuejs-tips.github.io/vue-the-mask)

### [JsFiddle](https://jsfiddle.net/neves/r8cL3msn/1/)

![The Mask Heart](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-heart.gif)

## Install

```
yarn add vue-the-mask
or
npm i -S vue-the-mask
```

## Usage (two flavors)

### Global

```javascript
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)
```

### Local (inside the component)

```javascript
import TheMask from 'vue-the-mask'
export default {
  components: {TheMask}
}
```

## Tokens

```javascript
'#': {pattern: /\d/},
'X': {pattern: /[0-9a-zA-Z]/},
'S': {pattern: /[a-zA-Z]/},
'A': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleUpperCase()},
'a': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleLowerCase()},
'!': {escape: true}
```

![The Mask Money](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-hammer.gif)

## Properties

| Property    | Required | Type                    | Default | Description                                |
|-------------|----------|-------------------------|---------|--------------------------------------------|
| value       | false    | String                  |         | Input value or v-model                     |
| mask        | **true** | String, Function, Array |         | Mask pattern                               |
| masked      | false    | Boolean                 | false   | emit value with mask chars, default is raw |
| placeholder | false    | String                  |         | Same as html input                         |
| type        | false    | String                  | 'text'  | Input type (email, tel, number, ...)       |
| tokens      | false    | Object                  | [tokens](#tokens) | Custom tokens for mask           |

## What about money?

We understand that money format is a totally different domain, which needs another specific component. Stay tunned.

![The Mask Money](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-money.gif)

## Other Solutions

1. ![https://github.com/nosir/cleave.js](https://img.shields.io/github/stars/nosir/cleave.js.svg?style=social&label=Star) https://github.com/nosir/cleave.js
1. ![https://github.com/text-mask/text-mask](https://img.shields.io/github/stars/text-mask/text-mask.svg?style=social&label=Star) https://github.com/text-mask/text-mask
1. ![https://github.com/igorescobar/jQuery-Mask-Plugin](https://img.shields.io/github/stars/igorescobar/jQuery-Mask-Plugin.svg?style=social&label=Star) https://github.com/igorescobar/jQuery-Mask-Plugin
1. ![https://github.com/fernandofleury/vanilla-masker](https://img.shields.io/github/stars/fernandofleury/vanilla-masker.svg?style=social&label=Star) https://github.com/fernandofleury/vanilla-masker
1. ![https://github.com/angular-ui/ui-mask](https://img.shields.io/github/stars/angular-ui/ui-mask.svg?style=social&label=Star) https://github.com/angular-ui/ui-mask
1. ![https://github.com/insin/inputmask-core](https://img.shields.io/github/stars/insin/inputmask-core.svg?style=social&label=Star) https://github.com/insin/inputmask-core
1. ![https://github.com/niksmr/vue-masked-input](https://img.shields.io/github/stars/niksmr/vue-masked-input.svg?style=social&label=Star) https://github.com/niksmr/vue-masked-input
1. ![https://github.com/probil/v-mask](https://img.shields.io/github/stars/probil/v-mask.svg?style=social&label=Star) https://github.com/probil/v-mask
1. ![https://github.com/moip/awesome-mask](https://img.shields.io/github/stars/moip/awesome-mask.svg?style=social&label=Star) https://github.com/moip/awesome-mask
1. ![https://github.com/the-darc/string-mask](https://img.shields.io/github/stars/the-darc/string-mask.svg?style=social&label=Star) https://github.com/the-darc/string-mask
1. ![https://github.com/romulobrasil/PureMask.js](https://img.shields.io/github/stars/romulobrasil/PureMask.js.svg?style=social&label=Star) https://github.com/romulobrasil/PureMask.js
1. ![https://github.com/devindex/vue-mask](https://img.shields.io/github/stars/devindex/vue-mask.svg?style=social&label=Star) https://github.com/devindex/vue-mask

## Currency

1. ![https://github.com/plentz/jquery-maskmoney](https://img.shields.io/github/stars/plentz/jquery-maskmoney.svg?style=social&label=Star) https://github.com/plentz/jquery-maskmoney
1. ![https://github.com/flaviosilveira/Jquery-Price-Format](https://img.shields.io/github/stars/flaviosilveira/Jquery-Price-Format.svg?style=social&label=Star) https://github.com/flaviosilveira/Jquery-Price-Format
1. ![https://github.com/kevinongko/vue-numeric](https://img.shields.io/github/stars/kevinongko/vue-numeric.svg?style=social&label=Star) https://github.com/kevinongko/vue-numeric

### [Suggest another one here](https://github.com/vuejs-tips/vue-the-mask/issues/new?title=Library+Suggestion)

## Contribution

You're free to contribute to this project by submitting [issues](https://github.com/vuejs-tips/v-tag-input.svg/issues) and/or [pull requests](https://github.com/vuejs-tips/v-tag-input.svg/pulls). This project is test-driven, so keep in mind that every change and new feature should be covered by tests. Your name will be added to the hall of fame ;)

![The Mask Wolf](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-wolf.gif)

## License

This project is licensed under [MIT License](http://en.wikipedia.org/wiki/MIT_License)





# Easy AdminLTE integration with Laravel 5

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeroennoten/Laravel-AdminLTE.svg?style=flat-square)](https://packagist.org/packages/jeroennoten/Laravel-AdminLTE)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/jeroennoten/Laravel-AdminLTE/master.svg?style=flat-square)](https://travis-ci.org/jeroennoten/Laravel-AdminLTE)
[![StyleCI](https://styleci.io/repos/38200433/shield)](https://styleci.io/repos/38200433)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/64be4634-446d-473b-b551-b4e4c0e3f97a.svg?style=flat-square)](https://insight.sensiolabs.com/projects/64be4634-446d-473b-b551-b4e4c0e3f97a)
[![Quality Score](https://img.shields.io/scrutinizer/g/jeroennoten/Laravel-AdminLTE.svg?style=flat-square)](https://scrutinizer-ci.com/g/jeroennoten/Laravel-AdminLTE)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/jeroennoten/Laravel-AdminLTE/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/jeroennoten/Laravel-AdminLTE/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/jeroennoten/Laravel-AdminLTE.svg?style=flat-square)](https://packagist.org/packages/jeroennoten/Laravel-AdminLTE)

This package provides an easy way to quickly set up [AdminLTE](https://almsaeedstudio.com) with Laravel 5. It has no requirements and dependencies besides Laravel, so you can start building your admin panel immediately. The package just provides a Blade template that you can extend and advanced menu configuration possibilities. A replacement for the `make:auth` Artisan command that uses AdminLTE styled views instead of the default Laravel ones is also included.

1. [Installation](#1-installation)
2. [Updating](#2-updating)
3. [Usage](#3-usage)
4. [The `make:adminlte` artisan command](#4-the-makeadminlte-artisan-command)
   1. [Using the authentication views without the `make:adminlte` command](#41-using-the-authentication-views-without-the-makeadminlte-command)
5. [Configuration](#5-configuration)
   1. [Menu](#51-menu)
     - [Custom menu filters](#custom-menu-filters)
     - [Menu configuration at runtime](#menu-configuration-at-runtime)
     - [Active menu items](#active-menu-items)
   2. [Plugins](#52-plugins)
6. [Translations](#6-translations)
7. [Customize views](#7-customize-views)
8. [Issues, Questions and Pull Requests](#8-issues-questions-and-pull-requests)

## 1. Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-adminlte
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    ```php
    JeroenNoten\LaravelAdminLte\ServiceProvider::class,
    ```

3. Publish the public assets:

    ```
    php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
    ```

## 2. Updating

1. To update this package, first update the composer package:

    ```
    composer update jeroennoten/laravel-adminlte
    ```

2. Then, publish the public assets with the `--force` flag to overwrite existing files

    ```
    php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets --force
    ```

## 3. Usage

To use the template, create a blade file and extend the layout with `@extends('adminlte::page')`.
This template yields the following sections:

- `title`: for in the `<title>` tag
- `content_header`: title of the page, above the content
- `content`: all of the page's content
- `css`: extra stylesheets (located in `<head>`)
- `js`: extra javascript (just before `</body>`)

All sections are in fact optional. Your blade template could look like the following.

```html
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
```

Note that in Laravel 5.2 or higher you can also use `@stack` directive for `css` and `javascript`:

```html
{{-- resources/views/admin/dashboard.blade.php --}}

@push('css')

@push('js')
```

You now just return this view from your controller, as usual. Check out [AdminLTE](https://almsaeedstudio.com) to find out how to build beautiful content for your admin panel.

## 4. The `make:adminlte` artisan command

> Note: only for Laravel 5.2 and higher

This package ships with a `make:adminlte` command that behaves exactly like `make:auth` (introduced in Laravel 5.2) but replaces the authentication views with AdminLTE style views.

```
php artisan make:adminlte
```

This command should be used on fresh applications, just like the `make:auth` command

### 4.1 Using the authentication views without the `make:adminlte` command

If you want to use the included authentication related views manually, you can create the following files and only add one line to each file:

- `resources/views/auth/login.blade.php`:
```
@extends('adminlte::login')
```
- `resources/views/auth/register.blade.php`
```
@extends('adminlte::register')
```
- `resources/views/auth/passwords/email.blade.php`
```
@extends('adminlte::passwords.email')
```
- `resources/views/auth/passwords/reset.blade.php`
```
@extends('adminlte::passwords.reset')
```

By default, the login form contains a link to the registration form.
If you don't want a registration form, set the `register_url` setting to `null` and the link will not be displayed.

## 5. Configuration

First, publish the configuration file:

```
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config
```

Now, edit `config/adminlte.php` to configure the title, skin, menu, URLs etc. All configuration options are explained in the comments. However, I want to shed some light on the `menu` configuration.

### 5.1 Menu

You can configure your menu as follows:

```php
'menu' => [
    'MAIN NAVIGATION',
    [
        'text' => 'Blog',
        'url' => 'admin/blog',
    ],
    [
        'text' => 'Pages',
        'url' => 'admin/pages',
        'icon' => 'file'
    ],
    [
        'text' => 'Show my website',
        'url' => '/',
        'target' => '_blank'
    ],
    'ACCOUNT SETTINGS',
    [
        'text' => 'Profile',
        'route' => 'admin.profile',
        'icon' => 'user'
    ],
    [
        'text' => 'Change Password',
        'route' => 'admin.password',
        'icon' => 'lock'
    ],
],
```

With a single string, you specify a menu header item to separate the items.
With an array, you specify a menu item. `text` and `url` or `route` are required attributes.
The `icon` is optional, you get an [open circle](http://fontawesome.io/icon/circle-o/) if you leave it out.
The available icons that you can use are those from [Font Awesome](http://fontawesome.io/icons/).
Just specify the name of the icon and it will appear in front of your menu item.

Use the `can` option if you want conditionally show the menu item. This integrates with Laravel's `Gate` functionality. If you need to conditionally show headers as well, you need to wrap it in an array like other menu items, using the `header` option:

```php
[
    [
        'header' => 'BLOG',
        'can' => 'manage-blog'
    ],
    [
        'text' => 'Add new post',
        'url' => 'admin/blog/new',
        'can' => 'add-blog-post'
    ],
]
```

#### Custom Menu Filters

If you need custom filters, you can easily add your own menu filters to this package. This can be useful when you are using a third-party package for authorization (instead of Laravel's `Gate` functionality).

For example with Laratrust:

```php
<?php

namespace MyApp;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust;

class MyMenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (isset($item['permission']) && ! Laratrust::can($item['permission'])) {
            return false;
        }

        return $item;
    }
}
```

And then add to `config/adminlte.php`:

```php
'filters' => [
    JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
    JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
    JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
    JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
    JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class, // Comment this line out if you want
    MyApp\MyMenuFilter::class,
]
```

#### Menu configuration at runtime

It is also possible to configure the menu at runtime, e.g. in the boot of any service provider.
Use this if your menu is not static, for example when it depends on your database or the locale.
It is also possible to combine both approaches. The menus will simply be concatenated and the order of service providers
determines the order in the menu.

To configure the menu at runtime, register a handler or callback for the `MenuBuilding` event, for example in the `boot()` method of a service provider:

```php
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{

    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'Blog',
                'url' => 'admin/blog',
            ]);
        });
    }

}
```
The configuration options are the same as in the static configuration files.

A more practical example that actually uses translations and the database:

```php
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('menu.pages'));

            $items = Page::all()->map(function (Page $page) {
                return [
                    'text' => $page['title'],
                    'url' => route('admin.pages.edit', $page)
                ];
            });

            $event->menu->add(...$items);
        });
    }
```

This event-based approach is used to make sure that your code that builds the menu runs only when the admin panel is actually displayed and not on every request.

#### Active menu items

By default, a menu item is considered active if any of the following holds:
- The current path matches the `url` parameter
- The current path is a sub-path of the `url` parameter
- If it has a submenu containing an active menu item

To override this behavior, you can specify an `active` parameter with an array of active URLs, asterisks and regular expressions are supported. Example:

```php
[
    'text' => 'Pages'
    'url' => 'pages',
    'active' => ['pages', 'content', 'content/*']
]
```

### 5.2 Plugins

By default the [DataTables](https://datatables.net/) plugin is supported. If set to `true`, the necessary javascript CDN script tags will automatically be injected into the `adminlte::page.blade` file.

```php
'plugins' => [
    'datatables' => true,
]
```

## 6. Translations

At the moment, English, German, French, Dutch, Portuguese and Spanish translations are available out of the box.
Just specifiy the language in `config/app.php`.
If you need to modify the texts or add other languages, you can publish the language files:

```
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=translations
```

Now, you can edit translations or add languages in `resources/lang/vendor/adminlte`.

## 7. Customize views

If you need full control over the provided views, you can publish them:

```
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=views
```

Now, you can edit the views in `resources/views/vendor/adminlte`.

## 8. Issues, Questions and Pull Requests

You can report issues and ask questions in the [issues section](https://github.com/jeroennoten/Laravel-AdminLTE/issues). Please start your issue with `ISSUE: ` and your question with `QUESTION: `

If you have a question, check the closed issues first. Over time, I've been able to answer quite a few.

To submit a Pull Request, please fork this repository, create a new branch and commit your new/updated code in there. Then open a Pull Request from your new branch. Refer to [this guide](https://help.github.com/articles/about-pull-requests/) for more info.


# Easy Flash Messages for Your Laravel App

This composer package offers a Twitter Bootstrap optimized flash messaging setup for your Laravel applications.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require laracasts/flash
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Laracasts\Flash\FlashServiceProvider::class,
];
```

Finally, as noted above, the default CSS classes for your flash message are optimized for Twitter Bootstrap. As such, pull in the Bootstrap's CSS within your HTML or layout file.

```html
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
```

## Usage

Within your controllers, before you perform a redirect, make a call to the `flash()` function.

```php
public function store()
{
    flash('Welcome Aboard!');

    return home();
}
```

You may also do:

- `flash('Message')->success()`: Set the flash theme to "success".
- `flash('Message')->error()`: Set the flash theme to "danger".
- `flash('Message')->warning()`: Set the flash theme to "warning".
- `flash('Message')->overlay()`: Render the message as an overlay.
- `flash()->overlay('Modal Message', 'Modal Title')`: Display a modal overlay with a title.
- `flash('Message')->important()`: Add a close button to the flash message.
- `flash('Message')->error()->important()`: Render a "danger" flash message that must be dismissed.

With this message flashed to the session, you may now display it in your view(s). Because flash messages and overlays are so common, we provide a template out of the box to get you started. You're free to use - and even modify to your needs - this template how you see fit.

```html
@include('flash::message')
```

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    @include('flash::message')

    <p>Welcome to my website...</p>
</div>

<!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Twitter Bootstrap. -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
```

The two package views will now be located in the `resources/views/vendor/flash/` directory.

```php
flash('Welcome Aboard!');

return home();
```

![https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/message.png](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/message.png)

```php
flash('Sorry! Please try again.')->error();

return home();
```

![https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/error.png](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/error.png)

```php
flash()->overlay('You are now a Laracasts member!', 'Yay');

return home();
```

![https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/overlay.png](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/flash/overlay.png)

> [Learn exactly how to build this very package on Laracasts!](https://laracasts.com/lessons/flexible-flash-messages)

## Hiding Flash Messages

A common desire is to display a flash message for a few seconds, and then hide it. To handle this, write a simple bit of JavaScript. For example, using jQuery, you might add the following snippet just before the closing `</body>` tag.

```
<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
```

This will find any alerts - excluding the important ones, which should remain until manually closed by the user - wait three seconds, and then fade them out.

## Multiple Flash Messages

Need to flash multiple flash messages to the session? No problem.

```php
flash('Message 1');
flash('Message 2')->important();

return redirect('somewhere');
```

Done! You'll now see two flash messages upon redirect.





# Laravel Filemanager
[![Latest Stable Version](https://poser.pugx.org/unisharp/laravel-filemanager/v/stable)](https://packagist.org/packages/unisharp/laravel-filemanager)
[![Total Downloads](https://poser.pugx.org/unisharp/laravel-filemanager/downloads)](https://packagist.org/packages/unisharp/laravel-filemanager)
[![License](https://poser.pugx.org/unisharp/laravel-filemanager/license)](https://packagist.org/packages/unisharp/laravel-filemanager)

 * Document : [unisharp.github.io/laravel-filemanager](http://unisharp.github.io/laravel-filemanager/)
   * [Installation](http://unisharp.github.io/laravel-filemanager/installation)
   * [Integration](http://unisharp.github.io/laravel-filemanager/integration)
   * [Config](http://unisharp.github.io/laravel-filemanager/config)
   * [Customization](http://unisharp.github.io/laravel-filemanager/customization)
   * [Events](http://unisharp.github.io/laravel-filemanager/events)
   * [Upgrade](http://unisharp.github.io/laravel-filemanager/upgrade)
 * Demo : [Laravel Filemanager container](https://github.com/UniSharp/laravel-filemanager-example-5.3)

## v1.7 released
 * Please follow the intructions in [upgrade document](https://unisharp.github.io/laravel-filemanager/upgrade).
 * Important changes :
   * All code refactored.
   * Fix Windows compatibility.
   * Fix file cannot be uploaded to "File Mode".
   * Config file is also refactored, see [config document](https://unisharp.github.io/laravel-filemanager/config).

## Security

It is important to note that if you use your own routes **you must protect your routes to Laravel-Filemanager in order to prevent unauthorized uploads to your server**. Fortunately, Laravel makes this very easy.

If, for example, you want to ensure that only logged in users have the ability to access the Laravel-Filemanager, simply wrap the routes in a group, perhaps like this:

```php
Route::group(array('before' => 'auth'), function ()
{
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\LfmController@upload');
    // list all lfm routes here...
});
```

This approach ensures that only authenticated users have access to the Laravel-Filemanager. If you are using Middleware or some other approach to enforce security, modify as needed.

**If you use the laravel-filemanager default route, make sure the `auth` middleware (set in config/lfm.php) is enabled and functional**.


## Credits
Special thanks to

 * [All contibutors](https://github.com/UniSharp/laravel-filemanager/graphs/contributors) from GitHub. (issues / PR)
 * [@taswler](https://github.com/tsawler) the original author.
 * [@olivervogel](https://github.com/olivervogel) for the awesome [image library](https://github.com/Intervention/image).
 * All [@UniSharp](https://github.com/UniSharp) members.
 
 
 
 
 
 # CORS Middleware for Laravel 5
 
 [![Latest Version on Packagist][ico-version]][link-packagist]
 [![Software License][ico-license]](LICENSE.md)
 [![Build Status][ico-travis]][link-travis]
 [![Total Downloads][ico-downloads]][link-downloads]
 
 Based on https://github.com/asm89/stack-cors
 
 ## About
 
 The `laravel-cors` package allows you to send [Cross-Origin Resource Sharing](http://enable-cors.org/)
 headers with Laravel middleware configuration.
 
 If you want to have have a global overview of CORS workflow, you can  browse
 this [image](http://www.html5rocks.com/static/images/cors_server_flowchart.png).
 
 ## Features
 
 * Handles CORS pre-flight OPTIONS requests
 * Adds CORS headers to your responses
 
 ## Installation
 
 Require the `barryvdh/laravel-cors` package in your `composer.json` and update your dependencies:
 ```sh
 $ composer require barryvdh/laravel-cors
 ```
 
 Add the Cors\ServiceProvider to your `config/app.php` providers array:
 ```php
 Barryvdh\Cors\ServiceProvider::class,
 ```
 
 ## Global usage
 
 To allow CORS for all your routes, add the `HandleCors` middleware in the `$middleware` property of  `app/Http/Kernel.php` class:
 
 ```php
 protected $middleware = [
     // ...
     \Barryvdh\Cors\HandleCors::class,
 ];
 ```
 
 ## Group middleware
 
 If you want to allow CORS on a specific middleware group or route, add the `HandleCors` middleware to your group:
 
 ```php
 protected $middlewareGroups = [
     'web' => [
        // ...
     ],
 
     'api' => [
         // ...
         \Barryvdh\Cors\HandleCors::class,
     ],
 ];
 ```
 
 ## Configuration
 
 The defaults are set in `config/cors.php`. Copy this file to your own config directory to modify the values. You can publish the config using this command:
 ```sh
 $ php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"
 ```
 > **Note:** When using custom headers, like `X-Auth-Token` or `X-Requested-With`, you must set the `allowedHeaders` to include those headers. You can also set it to `array('*')` to allow all custom headers.
 
 > **Note:** If you are explicitly whitelisting headers, you must include `Origin` or requests will fail to be recognized as CORS.
 
     
 ```php
 return [
      /*
      |--------------------------------------------------------------------------
      | Laravel CORS
      |--------------------------------------------------------------------------
      |
      | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
      | to accept any value.
      |
      */
     'supportsCredentials' => false,
     'allowedOrigins' => ['*'],
     'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
     'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
     'exposedHeaders' => [],
     'maxAge' => 0,
 ]
 ```
 
 `allowedOrigins`, `allowedHeaders` and `allowedMethods` can be set to `array('*')` to accept any value.
 
 > **Note:** Try to be a specific as possible. You can start developing with loose constraints, but it's better to be as strict as possible!
 
 > **Note:** Because of [http method overriding](http://symfony.com/doc/current/reference/configuration/framework.html#http-method-override) in Laravel, allowing POST methods will also enable the API users to perform PUT and DELETE requests as well.
 
 ### Lumen
 
 On Laravel Lumen, load your configuration file manually in `bootstrap/app.php`:
 ```php
 $app->configure('cors');
 ```
 
 And register the ServiceProvider:
 
 ```php
 $app->register(Barryvdh\Cors\ServiceProvider::class);
 ```
 
 ## Global usage for Lumen
 To allow CORS for all your routes, add the `HandleCors` middleware to the global middleware:
 ```php
 $app->middleware([
     // ...
     \Barryvdh\Cors\HandleCors::class,
 ]);
 ```
 
 ## Group middleware for Lumen
 If you want to allow CORS on a specific middleware group or route, add the `HandleCors` middleware to your group:
 
 ```php
 $app->routeMiddleware([
     // ...
     'cors' => \Barryvdh\Cors\HandleCors::class,
 ]);
 ```
 
 ## Common problems and errors (Pre Laravel 5.3)
 In order for the package to work, the request has to be a valid CORS request and needs to include an "Origin" header.
 
 When an error occurs, the middleware isn't run completely. So when this happens, you won't see the actual result, but will get a CORS error instead.
 
 This could be a CSRF token error or just a simple problem.
 
 > **Note:** This should be working in Laravel 5.3+.
 
 ### Disabling CSRF protection for your API
 
 If possible, use a different route group with CSRF protection enabled. 
 Otherwise you can disable CSRF for certain requests in `App\Http\Middleware\VerifyCsrfToken`:
 
 ```php
 protected $except = [
     'api/*'
 ];
 ```
     
 ## License
 
 Released under the MIT License, see [LICENSE](LICENSE).
 
 [ico-version]: https://img.shields.io/packagist/v/barryvdh/laravel-cors.svg?style=flat-square
 [ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
 [ico-travis]: https://img.shields.io/travis/barryvdh/laravel-cors/master.svg?style=flat-square
 [ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/barryvdh/laravel-cors.svg?style=flat-square
 [ico-code-quality]: https://img.shields.io/scrutinizer/g/barryvdh/laravel-cors.svg?style=flat-square
 [ico-downloads]: https://img.shields.io/packagist/dt/barryvdh/laravel-cors.svg?style=flat-square
 
 [link-packagist]: https://packagist.org/packages/barryvdh/laravel-cors
 [link-travis]: https://travis-ci.org/barryvdh/laravel-cors
 [link-scrutinizer]: https://scrutinizer-ci.com/g/barryvdh/laravel-cors/code-structure
 [link-code-quality]: https://scrutinizer-ci.com/g/barryvdh/laravel-cors
 [link-downloads]: https://packagist.org/packages/barryvdh/laravel-cors
 [link-author]: https://github.com/barryvdh
 [link-contributors]: ../../contributors
 
 
 
 
 Pretty Routes for Laravel 5
 ====
 
 Visualise your routes in pretty format.
 
 ![Pretty Routes](https://raw.githubusercontent.com/garygreen/pretty-routes/master/screenshot.png)
 
 # Installation
 
 ```bash
 composer require garygreen/pretty-routes
 ```
 
 Add to your `config/app.php` providers array:
 
 ```php
 PrettyRoutes\ServiceProvider::class,
 ```
 
 By default the package exposes a `/routes` url. If you wish to configure this, publish the config.
 
 ```bash
 php artisan vendor:publish --provider="PrettyRoutes\ServiceProvider"
 ```