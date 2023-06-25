<?php

namespace Szemul\Templating\Test\View;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Test\Stub\RendererTraitStub;
use Szemul\Templating\Test\Stub\StreamStub;

class RendererTraitTest extends TestCase
{
    public function testRenderView_shouldWriteResultFoGivenFunctionToTheGivenStream()
    {
        $templateContent = 'template';
        $stream          = new StreamStub();

        $templateFunction = function () use ($templateContent) {
            echo $templateContent;
        };

        $this->getSut()->callRenderView($stream, $templateFunction);

        $this->assertSame($templateContent, $stream->getContents());
    }

    private function getSut(): RendererTraitStub
    {
        return new RendererTraitStub();
    }
}
