# Empty Coalesce Operator for Twig

[![Packagist](https://img.shields.io/packagist/v/gglnx/twig-empty-coalesce.svg)](https://packagist.org/packages/gglnx/twig-empty-coalesce)

This library adds a new [operator expression](https://twig.symfony.com/doc/2.x/templates.html#expressions) to Twig with three question marks (`???`) to check if the left value is defined, not null and not empty. Works the same way as the [`empty` test](https://twig.symfony.com/doc/2.x/tests/empty.html) and the `|default` filter.

```twig
{% set _null = null %}
{% set _empty = '' %}

{# Null Coalesce: Output will be string(0) "" because _empty is defined and not exactly null #}
{{ dump(_undefined ?? _null ?? _empty ?? 'fallback') }}

{# Default Filter: Output will be string(8) "fallback" because _empty is defined, but an empty string #}
{{ dump(_undefined | default(_null | default(_empty | default('fallback')))) }}

{# Same as the default filter, but much more readable #}
{{ dump(_undefined ??? _null ??? _empty ??? 'fallback') }}
```

## Requirements

* Twig >=2.14 and Twig >=3.0
* PHP >=7.4

## Installation

The recommended way to install this loader is via [Composer](https://getcomposer.org/):

```bash
composer require gglnx/twig-empty-coalesce
```

You can install this library as extension in:  

```php
require_once '/path/to/vendor/autoload.php';

$twig = new \Twig\Environment($loader);
$twig->addExtension(new \Gglnx\TwigEmptyCoalesce\Extension\EmptyCoalesceExtension());
```
