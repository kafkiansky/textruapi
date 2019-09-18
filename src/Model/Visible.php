<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class Visible
{
    private const VIS_ON = 'vis_on';

    /**
     * @var string
     */
    private $value;

    /**
     * @return Visible
     */
    public static function visOn(): Visible
    {
        return new self(self::VIS_ON);
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
