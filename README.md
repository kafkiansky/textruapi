# The php library for api [text.ru](http://text.ru) interacting

# Requirements

* PHP 7.2 or higher
* GuzzleHttp 6.3 or higher

# Installation

Use **Composer** for install:
```
composer require kafkiansky/textruapi
``` 

# Usage

Simple create object of class TextruInteractor with two arguments:

```php
1. Send text for checking, put in `sendForVerification()` method `QueuedText` object with needed arguments, e.g. Text, CallbackUrl, etc.

<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Kafkiansky\Textru\Model\CallbackUrl;
use Kafkiansky\Textru\Model\QueuedText;
use Kafkiansky\Textru\Model\Text;
use Kafkiansky\Textru\Model\UserKey;
use Kafkiansky\Textru\ReadModel\QueuedTextResponse;
use Kafkiansky\Textru\TextruInteractor;
use GuzzleHttp\Client;

$userKey = 'userKeyFromTextRuApi';

$interactor = new TextruInteractor(new Client(), new UserKey($userKey));

/** @var QueuedTextResponse $queuedTextResponse */
$queuedTextResponse = $interactor->sendForVerification(new QueuedText(new Text('your_text'), new CallbackUrl('your_url')));

echo $queuedTextResponse->getTextUid(); // 48934969

```