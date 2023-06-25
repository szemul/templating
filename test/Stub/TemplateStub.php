<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamInterface;
use Szemul\Templating\View\TemplateAbstract;

class TemplateStub extends TemplateAbstract
{
    protected function renderTemplate(StreamInterface $stream): void
    {
        $stream->write('template');

        echo 'Rendered';
    }
}
