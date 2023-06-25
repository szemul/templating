<?php

namespace Szemul\Templating\Test\Data;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Enum\Type;
use Szemul\Templating\Sanitizer\RawSanitizer;
use Szemul\Templating\Sanitizer\SanitizerRegistry;
use Szemul\Templating\Test\Stub\TemplateDataAbstractStub;

class TemplateDataAbstractTest extends TestCase
{
    public function testSanitize_shouldUseProperSanitizer()
    {
        $value          = 12;
        $expectedResult = '12';

        $result = $this->getSut()->sanitize(Type::RAW, $value);

        $this->assertSame($expectedResult, $result);
    }

    private function getSut(): TemplateDataAbstractStub
    {
        $registry = new SanitizerRegistry();
        $registry->set(Type::RAW, new RawSanitizer());

        return new TemplateDataAbstractStub($registry);
    }
}
