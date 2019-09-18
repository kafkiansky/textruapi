<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Tests\Unit\Model;

use Kafkiansky\Textru\Exception\InvalidQueuedTextException;
use Kafkiansky\Textru\Model\QueuedText;
use Kafkiansky\Textru\Model\Text;
use PHPUnit\Framework\TestCase;

class QueuedTextTest extends TestCase
{
    private $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rutrum ante tortor, porta sagittis nisi rutrum congue. Vestibulum ante ipsum.';

    public function testQueuedTextGotSuccess()
    {
        $queuedText = new QueuedText(new Text($this->text));

        $this->assertNotEmpty($queuedText->getText()->getValue());
        $this->assertInstanceOf('Kafkiansky\Textru\Model\Text', $queuedText->getText());
    }

    public function testQueuedTextGotFailed()
    {
        $this->expectException(InvalidQueuedTextException::class);
        $this->expectExceptionMessage('Text is too short, minimum value is 100 chars');
        $queuedText = new QueuedText(new Text(''));
    }
}
