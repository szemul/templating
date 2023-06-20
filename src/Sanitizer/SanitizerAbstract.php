<?php

namespace Szemul\Templating\Sanitizer;

abstract class SanitizerAbstract implements SanitizerInterface
{
    abstract protected function sanitizeSingleValue(float|int|bool|string|null $value): string;

    public function sanitize(mixed $value): mixed
    {
        return $this->recursiveSanitize($value);
    }

    private function recursiveSanitize(mixed &$value): mixed
    {
        if (is_iterable($value)) {
            foreach ($value as $key => $subValue) {
                $value[$key] = $this->recursiveSanitize($subValue);
            }
        } elseif ($value instanceof \BackedEnum) {
            $value = (string)$value->value;
        } else {
            $value = $this->sanitizeSingleValue($value);
        }

        return $value;
    }
}
