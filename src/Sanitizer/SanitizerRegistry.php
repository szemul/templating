<?php

namespace Szemul\Templating\Sanitizer;

use Szemul\Templating\Enum\Type;
use Szemul\Templating\Exception\SanitizerNotRegisteredException;
use Szemul\Templating\Exception\UnsupportedTypeException;

class SanitizerRegistry
{
    /** @var array<string, SanitizerInterface> */
    private array $sanitizers = [];

    /**
     * @throws UnsupportedTypeException
     */
    public function set(Type $type, SanitizerInterface $sanitizer): self
    {
        if (!in_array($type, $sanitizer->getSupportedTypes())) {
            throw new UnsupportedTypeException();
        }

        $this->sanitizers[$type->value] = $sanitizer;

        return $this;
    }

    /**
     * @throws SanitizerNotRegisteredException
     */
    public function getSanitizer(Type $type): SanitizerInterface
    {
        if (!array_key_exists($type->value, $this->sanitizers)) {
            throw new SanitizerNotRegisteredException('No sanitizer set for type: ' . $type->value);
        }

        return $this->sanitizers[$type->value];
    }
}
