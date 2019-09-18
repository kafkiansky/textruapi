<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Tests\Unit\Model;

use Kafkiansky\Textru\Exception\InvalidQueuedTextException;
use Kafkiansky\Textru\Model\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    private $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rutrum ante tortor, porta sagittis nisi rutrum congue. Vestibulum ante ipsum.';

    public function testTextGotSuccess()
    {
        $text = new Text($this->text);
        $this->assertNotEmpty($text->getValue());
    }

    public function testTextGotFailed()
    {
        $this->expectException(InvalidQueuedTextException::class);
        $this->expectExceptionMessage('Text is too short, minimum value is 100 chars');
        $text = new Text('');
    }
}
