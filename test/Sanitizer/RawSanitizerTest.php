<?php

namespace Szemul\Templating\Test\Sanitizer;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Enum\Type;
use Szemul\Templating\Sanitizer\RawSanitizer;
use Szemul\Templating\Test\Stub\EnumStub;

class RawSanitizerTest extends TestCase
{
    public function testGetSupportedTypes_shouldReturnRaw()
    {
        $supportedTypes = $this->getSut()->getSupportedTypes();

        $this->assertSame([Type::RAW], $supportedTypes);
    }

    public function singleValueProvider(): array
    {
        return [
            'null'  => [null, ''],
            'true'  => [true, '1'],
            'false' => [false, ''],
            'int'   => [12, '12'],
            'float' => [1.2, '1.2'],
            'enum'  => [EnumStub::FIRST, 'first'],
        ];
    }

    /**
     * @dataProvider singleValueProvider
     */
    public function testSanitizeWhenSingleValueGiven_shouldSanitize($value, string $expectedResult)
    {
        $result = $this->getSut()->sanitize($value);

        $this->assertSame($expectedResult, $result);
    }

    public function testSanitizeWhenArrayGiven_shouldSanitizeEveryElement()
    {
        $array = [
            'test' => [
                true,
                'inner' => [
                    12,
                ],
            ],
        ];
        $expectedResult = [
            'test' => [
                '1',
                'inner' => [
                    '12',
                ],
            ],
        ];

        $result = $this->getSut()->sanitize($array);

        $this->assertSame($expectedResult, $result);
    }

    private function getSut(): RawSanitizer
    {
        return new RawSanitizer();
    }
}
