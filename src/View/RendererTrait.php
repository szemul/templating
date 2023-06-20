<?php

declare(strict_types=1);

namespace Szemul\Templating\View;

use Psr\Http\Message\StreamInterface;

trait RendererTrait
{
    protected function renderView(StreamInterface $stream, callable $templateFunction): void
    {
        $handler = function (string $buffer) use ($stream): string {
            $stream->write($buffer);

            return '';
        };

        ob_start($handler, 1024);

        try {
            $templateFunction();
        } finally {
            ob_end_flush();
        }
    }
}
