<?php

declare(strict_types=1);

namespace Szemul\Templating\Sanitizer;

use JsonException;
use Szemul\Templating\Enum\Type;
use Szemul\Templating\Exception\FailedToSanitizeException;

class JsonSanitizer extends SanitizerAbstract
{
    public function getSupportedTypes(): array
    {
        return [
            Type::JSON,
            Type::JS,
        ];
    }

    protected function sanitizeSingleValue(float|bool|int|string|null $value): string
    {
        try {
            return json_encode($value, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new FailedToSanitizeException('Json encode failed', previous: $e);
        }
    }
}
