<?php

declare(strict_types=1);

namespace App;

use Framework\TemplateEngine;
use App\Services\{PostService, ValidatorService, UserService};
use Framework\{Database, Container};

return [
    TemplateEngine::class => fn () => new TemplateEngine(__DIR__ . "/views"),
    ValidatorService::class => fn () => new ValidatorService(),
    Database::class => fn () => new Database(
        $_ENV['DB_DRIVER'],
        [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME'],
        ],
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD']
    ),
    UserService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new UserService($db);
    },
    PostService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new PostService($db);
    }
];
