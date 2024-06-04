<?php

declare(strict_types=1);

function dd(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function redirectTo(string $uri)
{
    header("Location:{$uri}");
    http_response_code(302);
    exit;
}
