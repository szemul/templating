<?php

declare(strict_types=1);

namespace Szemul\Templating\View;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

abstract class TemplateWithLayoutAbstract extends TemplateAbstract
{
    public function __construct(
        protected readonly StreamFactoryInterface $streamFactory,
        protected readonly LayoutAbstract $layout,
    ) {
    }

    public function render(StreamInterface $stream): void
    {
        $templateStream = $this->streamFactory->createStream();

        parent::render($templateStream);

        $this->layout->render($stream, $templateStream);
    }
}
