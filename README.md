# YaRouter

YaRouter is (yet another) PHP router. It's built to be simple and easy to use with minimal configuration.

It does one thing only. It routs URI/URL requests (Such as: `https://example.com/foo`) to a view/template (Such as: `/path/to/view/foo.html`). Keeping your URLs clean and friendly!

## Installation

Current version is 1.1.2

`composer require digi-brains/ya-router 1.1.2`

## Overview

YaRouter assumes 2 things.

1. You are, through your server or document root config file, directing all traffic through a single entry point/bootstrap file; such as `index.php`.

2. Your views file-names reflect your URL structure. For example, If your URL is `example.com/foo/bar/my-page`, YaRouter expects to find the view for this page at `path/to/templates/foo/bar/my-page.html`. [1](#anytype).

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
		  |_service1.html 	(example.com/services/service1.html)
		  |
		  |_service2.html 	(example.com/services/service2.html)
		  |
		  |_service3.html 	(example.com/services/service3.html)

...etc...

```


## Documentation

Set up your _index.php_ file (or whatever file you are pointing your inbound requests to).

**If you are using an autoloader, like composer**

Start by `require`-ing the autoloader script: `require __DIR__ . '/vendor/autoload.php';`.

Then `use` the YaRouter\Router.

**If you're not using an autoloader**

Just `include` the Router.php script

**Next define your parameters:**

1. `$views` This is the path to the main directory where your views are stored.

2. `$type` This is the _type_ of view file you are calling (extension only). E.g., html, php, etc...

3. `$default` The name of the default view file (without the extension). Typically used for home or index page.

**Finally, create a** `new Router()` **object with your parameters and then call the** `get_view` **method.**

### Kitchen Sink Example:

```
(index.php)
<?php
require __DIR__ . '/vendor/autoload.php';

use YaRouter\Router;

$views = 'path/to/views';
$type = 'html';
$default = 'index';

$r = new Router( $views, $type, $default  );
$r->get_view();
```

#### Appendix

1. <a name="anytype"></a>_Your views can be any type. E.g., .htm, .html, .md, .php, etc..._