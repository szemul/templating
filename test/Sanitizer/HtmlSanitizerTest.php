<?php

namespace Szemul\Templating\Test\Sanitizer;

use PHPUnit\Framework\TestCase;
use Szemul\Templating\Enum\Type;
use Szemul\Templating\Sanitizer\HtmlSanitizer;
use Szemul\Templating\Test\Stub\EnumStub;

class HtmlSanitizerTest extends TestCase
{
    public function testGetSupportedTypes_shouldReturnHtml()
    {
        $supportedTypes = $this->getSut()->getSupportedTypes();

        $this->assertCount(1, $supportedTypes);
        $this->assertSame(Type::HTML, $supportedTypes[0]);
    }

    public function singleValueProvider(): array
    {
        return [
            'null'  => [null, ''],
            'true'  => [true, '1'],
            'false' => [false, '0'],
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

    public function testSanitizeWhenHtmlStringGiven_shouldEscape()
    {
        $result = $this->getSut()->sanitize('<html></html>');

        $this->assertSame('&lt;html&gt;&lt;/html&gt;', $result);
    }

    private function getSut(): HtmlSanitizer
    {
        return new HtmlSanitizer();
    }
}
