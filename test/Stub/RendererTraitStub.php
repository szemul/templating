<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamInterface;
use Szemul\Templating\View\RendererTrait;

class RendererTraitStub
{
    use RendererTrait;

    public function callRenderView(StreamInterface $stream, callable $templateFunction)
    {
        $this->renderView($stream, $templateFunction);
    }
}
