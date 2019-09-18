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

1. Send text for checking, put in `sendForVerification()` method `QueuedText` object with needed arguments, 
e.g. Text, CallbackUrl, etc.
All arguments except text are not required.

```php

<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Kafkiansky\Textru\Model\CallbackUrl;
use Kafkiansky\Textru\Model\QueuedText;
use Kafkiansky\Textru\Model\Text;
use Kafkiansky\Textru\Model\UserKey;
use Kafkiansky\Textru\ReadModel\QueuedTextResponse;
use Kafkiansky\Textru\TextruInteractor;
use Kafkiansky\Textru\Model\ResultFor;
use GuzzleHttp\Client;
use Kafkiansky\Textru\Model\JsonVisible;
use Kafkiansky\Textru\ReadModel\CheckedResult;

$userKey = 'userKeyFromTextRuApi';

$interactor = new TextruInteractor(new Client(), new UserKey($userKey));

/** @var QueuedTextResponse $queuedTextResponse */
$queuedTextResponse = $interactor->sendForVerification(new QueuedText(new Text('your_text'), new CallbackUrl('your_url')));

$textUid =  $queuedTextResponse->getTextUid();

echo $textUid;  // 48934969

```

2. After that use `getResultFor` method with `ResultFor` object

```php
<?php

/** @var \Kafkiansky\Textru\ReadModel\CheckedResult $checkedResult */
$checkedResult = $interactor->getResultFor(new ResultFor($textUid, JsonVisible::detail()));

var_dump($checkedResult->getDateCheck()); // DateTimeImmutable object

echo $checkedResult->getUnique(); // 0.00

print_r($checkedResult->getUrls()); // plagiat urls

echo $checkedResult->getCountCharsWithoutSpace(); // 327

echo $checkedResult->getCountCharsWithSpace(); // 383

echo $checkedResult->getCountWords(); // 122

echo $checkedResult->getSpamPercent(); // 15

echo $checkedResult->getWaterPercent(); // 41

# Text.ru return result after time (10-30 m), not immediately.
# To check that result exist, simple use isChecked() method of $checkedResult object, e.g:

if ($checkedResult->isChecked()) {
    // store in database
}

``` 

3. Get account size symbols info

```php
<?php


echo $interactor->getRemainingChars(); // 4444 

```