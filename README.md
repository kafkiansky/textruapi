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

/** @var CheckedResult $checkedResult */
$checkedResult = $interactor->getResultFor(new ResultFor($textUid, JsonVisible::detail()));

var_dump($checkedResult);

object(Kafkiansky\Textru\ReadModel\CheckedResult)#35 (10) {
  ["dateCheck":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  object(DateTimeImmutable)#33 (3) {
    ["date"]=>
    string(26) "2019-09-18 13:43:09.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
  ["unique":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  string(4) "0.00"
  ["urls":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  array(3) {
    [0]=>
    array(3) {
      ["url"]=>
      string(61) "https://proglib.io/p/chto-est-algebraicheskie-tipy-2019-09-15"
      ["plagiat"]=>
      int(100)
      ["words"]=>
      string(148) "0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40 41 42 43 44 45 46 47 48 49 50 51 52"
    }
    [1]=>
    array(3) {
      ["url"]=>
      string(69) "https://brainoteka.com/blogs/c-spravochnik/tipi-dannih-i-peremennie-c"
      ["plagiat"]=>
      float(21.09)
      ["words"]=>
      string(38) "31 32 34 39 40 41 43 44 45 49 50 51 52"
    }
    [2]=>
    array(3) {
      ["url"]=>
      string(107) "https://www.bestprog.net/ru/2016/08/08/02-базовые-системные-или-типы-значени/"
      ["plagiat"]=>
      float(16.93)
      ["words"]=>
      string(32) "31 32 34 35 43 44 45 47 49 50 52"
    }
  }
  ["countCharsWithSpace":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  int(382)
  ["countCharsWithoutSpace":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  int(327)
  ["countWords":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  int(53)
  ["waterPercent":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  int(15)
  ["spamPercent":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  int(41)
  ["listKeys":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  NULL
  ["listKeysGroup":"Kafkiansky\Textru\ReadModel\CheckedResult":private]=>
  NULL
}


``` 