<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class FlashMiddleware implements MiddlewareInterface
{
    public function __construct(private TemplateEngine $templateEngine)
    {
    }
    public function process(callable $next)
    {

        $this->templateEngine->addGlobalData('errors', $_SESSION['errors'] ?? []);
        $this->templateEngine->addGlobalData('oldFormData', $_SESSION['oldFormData'] ?? []);
        unset($_SESSION['oldFormData']);
        unset($_SESSION['errors']);
        $next();
    }
}
