<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Tests;

use GuzzleHttp\Client;
use Kafkiansky\Textru\Exception\InvalidQueuedTextException;
use Kafkiansky\Textru\Exception\InvalidUserKeyException;
use Kafkiansky\Textru\Model\QueuedText;
use Kafkiansky\Textru\Model\Text;
use Kafkiansky\Textru\Model\UserKey;
use Kafkiansky\Textru\TextruInteractor;
use PHPUnit\Framework\TestCase;

class TextruInteractorTest extends TestCase
{
    private $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rutrum ante tortor, porta sagittis nisi rutrum congue. Vestibulum ante ipsum.';

    public function testThatInteractorReturnSuccessResult()
    {
        $interactor = new TextruInteractor(new Client(), new UserKey('178a27661a34583d820ade4db368c441'));

        $response = $interactor->sendForVerification(new QueuedText(new Text($this->text)));

        $this->assertInstanceOf('Kafkiansky\Textru\ReadModel\QueuedTextResponse', $response);

        $this->assertTrue($response->isSuccess());
        $this->assertFalse($response->isFailed());

        $this->assertNotNull($response->getTextUid());
        $this->assertNull($response->getErrorCode());
        $this->assertNull($response->getErrorDescription());
    }

    public function testThatInteractorReturnFailedResultBecauseUserKeyAreEmpty()
    {
        $this->expectException(InvalidUserKeyException::class);
        $this->expectExceptionMessage('User key is required');
        $interactor = new TextruInteractor(new Client(), new UserKey(''));
    }

    public function testThatInteractorReturnFailedBecauseTextInvalid()
    {
        $this->expectException(InvalidQueuedTextException::class);
        $this->expectExceptionMessage('Text is too short, minimum value is 100 chars');
        $interactor = new TextruInteractor(new Client(), new UserKey('35y25y2835y273y53'));
        $interactor->sendForVerification(new QueuedText(new Text('')));
    }
}
