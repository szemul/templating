<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamInterface;
use Szemul\Templating\View\LayoutAbstract;

class LayoutStub extends LayoutAbstract
{
    protected function renderLayout(StreamInterface $contentStream): void
    {
        echo 'layoutBegin';
        echo $contentStream;
        echo 'layoutEnd';
    }
}
