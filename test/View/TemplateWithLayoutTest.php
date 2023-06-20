<?php

namespace Szemul\Templating\Test\View;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Test\Stub\LayoutStub;
use Szemul\Templating\Test\Stub\StreamFactoryStub;
use Szemul\Templating\Test\Stub\StreamStub;
use Szemul\Templating\Test\Stub\TemplateWithLayoutStub;

class TemplateWithLayoutTest extends TestCase
{
    public function testRender_shouldRenderGivenLayoutAroundTemplate()
    {
        $stream = new StreamStub();

        $this->getSut()->render($stream);

        $this->assertSame('layoutBegin---template---layoutEnd', $stream->getContents());
    }

    private function getSut(): TemplateWithLayoutStub
    {
        return new TemplateWithLayoutStub(new StreamFactoryStub(), new LayoutStub());
    }
}
