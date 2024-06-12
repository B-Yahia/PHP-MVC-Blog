<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;

class GestOnlyMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (isset($_SESSION['user'])) {
            redirectTo('/');
        }
        $next();
    }
}
