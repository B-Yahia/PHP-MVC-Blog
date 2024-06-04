<?php

declare(strict_types=1);

namespace App;

use Framework\TemplateEngine;
use App\Services\ValidatorService;
use App\Middlewares\ValidationMiddleware;

return [
    TemplateEngine::class => fn () => new TemplateEngine(__DIR__ . "/views"),
    ValidatorService::class => fn () => new ValidatorService()

];
