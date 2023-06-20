<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamInterface;
use Szemul\Templating\View\TemplateWithLayoutAbstract;

class TemplateWithLayoutStub extends TemplateWithLayoutAbstract
{
    protected function renderTemplate(StreamInterface $stream): void
    {
        $stream->write('---template---');
    }
}
