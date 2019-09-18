<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\ReadModel;

final class QueuedTextResponse
{
    /**
     * @var string|null
     */
    private $textUid;

    /**
     * @var int|null
     */
    private $errorCode;

    /**
     * @var string|null
     */
    private $errorDescription;

    public function __construct(?string $textUid, ?int $errorCode, ?string $errorDescription)
    {
        $this->textUid = $textUid;
        $this->errorCode = $errorCode;
        $this->errorDescription = $errorDescription;
    }

    /**
     * @return string|null
     */
    public function getTextUid(): ?string
    {
        return $this->textUid;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getErrorDescription(): ?string
    {
        return $this->errorDescription;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->textUid !== null;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->errorCode !== null && $this->errorDescription !== null;
    }
}
