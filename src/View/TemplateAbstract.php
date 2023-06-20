<?php

declare(strict_types=1);

namespace Szemul\Templating\View;

use Psr\Http\Message\StreamInterface;

abstract class TemplateAbstract
{
    use RendererTrait;

    public function render(StreamInterface $stream): void
    {
        $this->renderView($stream, fn () => $this->renderTemplate($stream));
    }

    abstract protected function renderTemplate(StreamInterface $stream): void;
}
