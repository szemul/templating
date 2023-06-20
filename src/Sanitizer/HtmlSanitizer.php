<?php
declare(strict_types=1);

namespace Szemul\Templating\Sanitizer;

use Szemul\Templating\Enum\Type;

class HtmlSanitizer extends SanitizerAbstract
{
    public function __construct(
        protected readonly string $nullValue = '',
        protected readonly string $trueValue = '1',
        protected readonly string $falseValue = '0',
    ) {
    }

    public function getSupportedTypes(): array
    {
        return [
            Type::HTML,
        ];
    }

    protected function sanitizeSingleValue(string|int|float|bool|null $value): string
    {
        return htmlspecialchars($this->convertValues($value));
    }

    protected function convertValues(float|bool|int|string|null $value): string
    {
        return match ($value) {
            null    => $this->nullValue,
            true    => $this->trueValue,
            false   => $this->falseValue,
            default => (string)$value,
        };
    }
}
