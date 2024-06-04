<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MatchRule implements RuleInterface
{

    public function process(array $data, string $field, array $params): bool
    {
        return $data[$field] == $data[$params[0]];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Does not match " . $params[0];
    }
}
