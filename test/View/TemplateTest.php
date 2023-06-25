<?php

namespace Szemul\Templating\Test\View;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Test\Stub\StreamStub;
use Szemul\Templating\Test\Stub\TemplateStub;

class TemplateTest extends TestCase
{
    public function test()
    {
        $stream = new StreamStub();

        $this->getSut()->render($stream);

        $renderedTemplate = $stream->getContents();

        $this->assertSame('templateRendered', $renderedTemplate);
    }

    private function getSut(): TemplateStub
    {
        return new TemplateStub();
    }
}
