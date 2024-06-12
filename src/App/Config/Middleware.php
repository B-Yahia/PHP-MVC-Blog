<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middlewares\{CSRFGuardMiddleware, TemplateDataMiddleware, ValidationMiddleware, SessionMiddleware, FlashMiddleware, CsrfTokenMiddleware};

function regiterMiddleware(App $app)
{
    $app->addMiddleware(CSRFGuardMiddleware::class);
    $app->addMiddleware(CsrfTokenMiddleware::class);
    $app->addMiddleWare(TemplateDataMiddleware::class);
    $app->addMiddleWare(ValidationMiddleware::class);
    $app->addMiddleware(FlashMiddleware::class);
    $app->addMiddleware(SessionMiddleware::class);
}
