# YaRouter

YaRouter is (yet another) PHP router. It's built to be simple and easy to use with minimal configuration.

It does one thing only. It routs URI/URL requests (Such as: `https://example.com/foo`) to a view/template (Such as: `/path/to/view/foo.html`). Keeping your URLs clean and friendly!

## Installation

`composer require digi-brains/ya-router 1.0.0`

## Overview

YaRouter assumes 3 things.

1. You are, through your server or document root config file, directing all traffic through a single entry point; such as `index.php`.

2. You have a directory structure for your view files that reflects your information arcitecture. [See 1](#allviews)



Example:

```
/views
	|
	|__index.html 			(example.com)<-default view
	|
	|__/about
	|	  |
	|	  |_team.html 		(example.com/about/team.html)
	|	  |
	|	  |_products.html 	(example.com/about/products.html)
	|
	|__/services
		  |
		  |_service1.html 	(example.com/services/services1.html)
		  |
		  |_service2.html 	(example.com/services/services2.html)
		  |
		  |_service3.html 	(example.com/services/services3.html)

...etc...

```

3. Your view file names reflect your URL structure. For example, If your URL is `example.com/foo/bar/my-page`, YaRouter expects to find the view for this page at `path/to/templates/foo/bar/my-page.html`. [See 2](#anytype)

**Note** YaRout intends to support passing query strings in the URL to a page template. As of now this is in development. If you find a bug here let me know and/or send me a pull request.

## Documentation

In your _index.php_ file (or whatever file you are pointing your inbound requests to) you need to pass the router 3 parameters.

1. `$path` This is the path to the main directory where your views are stored.

2. `$type` This is the _type_ of view file you are calling (extension only). E.g., .html, .php, etc...

3. `$default` The name of the default view file (without the extension). Typically used for home or index page.

If you are using composer's autoload feature, start by `require`-ing the autoloader script:

`require __DIR__ . '/vendor/autoload.php';`


Then `use` the YaRouter\Router.

The router has one property available `template`. So you will create a `new Router()` object with your parameters and then `require` the template.

**Example:**

```
(index.php)
<?php
require __DIR__ . '/vendor/autoload.php';

use YaRouter\Router;

$views = 'path/to/views';
$type = 'html';
$default = 'index';

$r = new Router( $views, $type, $default  );
require $r->template;
```
### Appendix
1. <a name="allviews"></a>You can put all views in one folder if you prefer.
2. <a name="anytype"></a>Your views can be any type. E.g., .htm, .html, .md, .php, etc...