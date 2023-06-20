<?php

namespace Szemul\Templating\Data;

use Szemul\Templating\Enum\Type;

interface TemplateDataInterface
{
    public function sanitize(Type $type, mixed $value): mixed;
}
