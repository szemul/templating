<?php
declare(strict_types=1);

namespace Szemul\Templating\Sanitizer;

use Szemul\Templating\Enum\Type;
use Szemul\Templating\Exception\FailedToSanitizeException;

interface SanitizerInterface
{
    /**
     * @throws FailedToSanitizeException
     */
    public function sanitize(mixed $value): mixed;

    /**
     * @return Type[]
     */
    public function getSupportedTypes(): array;
}
