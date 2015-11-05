Laravel Cacheable
=========

[![Build Status Travis](https://travis-ci.org/valeryq/cacheable.svg?branch=master)](https://travis-ci.org/valeryq/cacheable)
[![Build Status Scrutinizer](https://scrutinizer-ci.com/g/valeryq/cacheable/badges/build.png?b=master)](https://scrutinizer-ci.com/g/valeryq/cacheable/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/valeryq/cacheable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/valeryq/cacheable/)
[![Total Downloads](https://poser.pugx.org/valeryq/cacheable/d/total.svg)](https://packagist.org/packages/valeryq/cacheable)
[![Latest Stable Version](https://poser.pugx.org/valeryq/cacheable/v/stable.svg)](https://packagist.org/packages/valeryq/cacheable)
[![License](https://poser.pugx.org/valeryq/cacheable/license.svg)](https://packagist.org/packages/valeryq/cacheable)

## Requirements

- PHP >= 5.5.9
- Laravel >= 5.1

## Installation

Require this package with composer:

```
composer require valeryq/cacheable
```

## Usage

You must implements the Cacheable contract into your class and you can use the CacheableTrait instead realized methods from contract.

For example (for repositories):

```php
<?php namespace App\Repositories\Cacheable;

use App\Models\Product;
use Valeryq\Cacheable\Contracts\Cacheable;
use Valeryq\Cacheable\Traits\CacheableTrait;

class CacheableProductRepository implements Cacheable
{
    use CacheableTrait;

    /**
     * Find product by id
     *
     * @param $id
     *
     * @return Product
     * @throws ModelNotFoundException
     */
    public function find($id)
    {
        return $this->cache()->remember('your_key', 60, function() {
            return Product::findOrFail($id);
        });
    }

    ....
}
```

### License

The Laravel Cacheable is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)