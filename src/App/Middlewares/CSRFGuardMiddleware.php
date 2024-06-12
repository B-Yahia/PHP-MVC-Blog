<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;

class CSRFGuardMiddleware implements MiddlewareInterface
{

    public function process(callable $next)

    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $validMethods = ['POST', 'PATCH', 'DELETE'];
        if (!in_array($requestMethod, $validMethods)) {
            $next();
            return;
        }

        if ($_SESSION['token'] !== $_POST['token']) {
            redirectTo('/');
        }

        unset($_SESSION['token']);
        $next();
    }
}
