<?php

declare(strict_types=1);

namespace Szemul\Templating\Sanitizer;

use Szemul\Templating\Enum\Type;

class RawSanitizer extends SanitizerAbstract
{
    public function getSupportedTypes(): array
    {
        return [
            Type::RAW,
        ];
    }

    protected function sanitizeSingleValue(float|bool|int|string|null $value): string
    {
        return (string)$value;
    }
}
