<?php

declare(strict_types=1);

namespace Szemul\Templating\View;

use Psr\Http\Message\StreamInterface;

abstract class LayoutAbstract
{
    use RendererTrait;

    public function render(StreamInterface $stream, StreamInterface $contentStream): void
    {
        $this->renderView($stream, fn () => $this->renderLayout($contentStream));
    }

    abstract protected function renderLayout(StreamInterface $contentStream): void;
}
