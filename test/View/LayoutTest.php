<?php

namespace Szemul\Templating\Test\View;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Test\Stub\LayoutStub;
use Szemul\Templating\Test\Stub\StreamStub;

class LayoutTest extends TestCase
{
    public function test_shouldRenderLayoutAroundGivenContent()
    {
        $stream        = new StreamStub();
        $contentStream = new StreamStub();
        $contentStream->write('---content---');

        $this->getSut()->render($stream, $contentStream);

        $this->assertSame('layoutBegin---content---layoutEnd', $stream->getContents());
    }

    private function getSut(): LayoutStub
    {
        return new LayoutStub();
    }
}
