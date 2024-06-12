<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {

            $oldFormData = $_POST;

            unset($oldFormData['password']);
            unset($oldFormData['confirm_password']);
            $_SESSION['errors'] = $e->errors;
            $_SESSION['oldFormData'] = $oldFormData;
            $refer = $_SERVER["HTTP_REFERER"];
            redirectTo($refer);
        }
    }
}
