<?php

namespace Szemul\Templating\Test\Sanitizer;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Enum\Type;
use Szemul\Templating\Exception\SanitizerNotRegisteredException;
use Szemul\Templating\Exception\UnsupportedTypeException;
use Szemul\Templating\Sanitizer\JsonSanitizer;
use Szemul\Templating\Sanitizer\RawSanitizer;
use Szemul\Templating\Sanitizer\SanitizerRegistry;

class SanitizerRegistryTest extends TestCase
{
    public function testSetWhenASanitizerIsGivenWithAnUnsupportedType_shouldThrowException()
    {
        $this->expectException(UnsupportedTypeException::class);
        $this->getSut()->set(Type::RAW, new JsonSanitizer());
    }

    public function testGetWhenSanitiserNotRegistered_shouldThrowException()
    {
        $this->expectException(SanitizerNotRegisteredException::class);
        $this->getSut()->getSanitizer(Type::RAW);
    }

    public function testSetAndGet_shouldReturnStoredSanitizer()
    {
        $type      = Type::RAW;
        $sanitizer = new RawSanitizer();
        $registry  = $this->getSut();

        $registry->set($type, $sanitizer);
        $storedSanitizer = $registry->getSanitizer($type);

        $this->assertSame($sanitizer, $storedSanitizer);
    }

    private function getSut(): SanitizerRegistry
    {
        return new SanitizerRegistry();
    }
}
