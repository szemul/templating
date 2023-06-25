<?php

namespace Szemul\Templating\Test\Stub;

use Psr\Http\Message\StreamInterface;

class StreamStub implements StreamInterface
{
    private string $value = '';

    public function __toString(): string
    {
        return $this->value;
    }

    public function close(): void
    {
    }

    public function detach()
    {
    }

    public function getSize(): ?int
    {
        return strlen($this->value);
    }

    public function tell(): int
    {
        return 0;
    }

    public function eof(): bool
    {
        return true;
    }

    public function isSeekable(): bool
    {
        return false;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
    }

    public function rewind(): void
    {
    }

    public function isWritable(): bool
    {
        return true;
    }

    public function write(string $string): int
    {
        $this->value .= $string;

        return strlen($string);
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function read(int $length): string
    {
        return $this->value;
    }

    public function getContents(): string
    {
        return $this->value;
    }

    public function getMetadata(?string $key = null)
    {
    }
}
