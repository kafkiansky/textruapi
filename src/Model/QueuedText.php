<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class QueuedText
{
    /**
     * @var Text
     */
    private $text;

    /**
     * @var ExceptDomain|null
     */
    private $exceptDomain;

    /**
     * @var CallbackUrl|null
     */
    private $callbackUrl;

    /**
     * @var ExceptUrl|null
     */
    private $exceptUrl;

    /**
     * @var Visible|null
     */
    private $visible;

    /**
     * @var Copying|null
     */
    private $copying;

    public function __construct(
        Text $text,
        ?CallbackUrl $callbackUrl = null,
        ?ExceptDomain $exceptDomain = null,
        ?ExceptUrl $exceptUrl = null,
        ?Visible $visible = null,
        ?Copying $copying = null
    ) {
        $this->text = $text;
        $this->exceptDomain = $exceptDomain;
        $this->callbackUrl = $callbackUrl;
        $this->exceptUrl = $exceptUrl;
        $this->visible = $visible;
        $this->copying = $copying;
    }

    /**
     * @return Text
     */
    public function getText(): Text
    {
        return $this->text;
    }

    /**
     * @return ExceptDomain|null
     */
    public function getExceptDomain(): ?ExceptDomain
    {
        return $this->exceptDomain;
    }

    /**
     * @return CallbackUrl|null
     */
    public function getCallbackUrl(): ?CallbackUrl
    {
        return $this->callbackUrl;
    }

    /**
     * @return ExceptUrl|null
     */
    public function getExceptUrl(): ?ExceptUrl
    {
        return $this->exceptUrl;
    }

    /**
     * @return Visible|null
     */
    public function getVisible(): ?Visible
    {
        return $this->visible;
    }

    /**
     * @return Copying|null
     */
    public function getCopying(): ?Copying
    {
        return $this->copying;
    }
}
