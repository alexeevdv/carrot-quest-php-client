# carrot-quest-php-client

[![Build Status](https://travis-ci.com/alexeevdv/carrot-quest-php-client.svg?branch=master)](https://travis-ci.com/alexeevdv/carrot-quest-php-client) 
[![codecov](https://codecov.io/gh/alexeevdv/carrot-quest-php-client/branch/master/graph/badge.svg)](https://codecov.io/gh/alexeevdv/carrot-quest-php-client)
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) 
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)
![PHP 7.3](https://img.shields.io/badge/PHP-7.3-green.svg)
![PHP 7.4](https://img.shields.io/badge/PHP-7.4-green.svg)

PHP client for carrotquest.io Web API

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require alexeevdv/carrot-quest-php-client "^0.1"
```

or add

```
"alexeevdv/carrot-quest-php-client": "^0.1"
```

to the ```require``` section of your `composer.json` file.

## Configuration

```php
$guzzle = new \GuzzleHttp\Client([
    'base_uri' => 'https://api.carrotquest.io',
]);

$apiClient = new \alexeevdv\CarrotQuest\Client(
    'your_auth_token_goes_here',
    $guzzle
);
```

## Implemented methods

### Setting user properties

https://carrotquest.io/developers/endpoints/users/props/

```php
interface ClientInterface
{
    public function userSetProperties(int $userId, array $properties, $isCarrotQuestUser = true): void;
}
```
