<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MinRule implements RuleInterface
{
    public function process(array $data, string $field, array $params): bool
    {
        if (empty($params[0])) {
            throw new \InvalidArgumentException("Minimum value not specified");
        }
        $length = (int) $data[$field];
        $minLength = (int) $params[0];
        return $length >= $minLength;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "The minimum value required to is " . $params[0];
    }
}
