<?php

declare(strict_types=1);

namespace Szemul\Templating\Data;

use Szemul\Templating\Enum\Type;
use Szemul\Templating\Sanitizer\SanitizerRegistry;

abstract class TemplateDataAbstract implements TemplateDataInterface
{
    public function __construct(protected readonly SanitizerRegistry $sanitizerRegistry)
    {
    }

    public function sanitize(Type $type, mixed $value): mixed
    {
        return $this->sanitizerRegistry->getSanitizer($type)->sanitize($value);
    }
}
