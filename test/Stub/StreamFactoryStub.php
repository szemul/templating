<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class StreamFactoryStub implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        $stream = new StreamStub();
        $stream->write($content);

        return $stream;
    }

    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return new StreamStub();
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return new StreamStub();
    }
}
