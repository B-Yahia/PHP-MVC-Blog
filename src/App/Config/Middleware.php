<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middlewares\{TemplateDataMiddleware, ValidationMiddleware, SessionMiddleware, FlashMiddleware};

function regiterMiddleware(App $app)
{
    $app->addMiddleWare(TemplateDataMiddleware::class);
    $app->addMiddleWare(ValidationMiddleware::class);
    $app->addMiddleware(FlashMiddleware::class);
    $app->addMiddleware(SessionMiddleware::class);
}
