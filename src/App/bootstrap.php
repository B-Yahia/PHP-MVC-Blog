<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use App\Controllers\{AboutController, HomeController, LoginController, PostController};
use Framework\App;

$app = new App();
$app->get("/", [HomeController::class, 'home']);
$app->get("/about", [AboutController::class, 'about']);
$app->get("/login", [LoginController::class, 'loginPage']);
$app->get("/signup", [LoginController::class, 'signupPage']);
$app->get("/add_post", [PostController::class, 'addPost']);


return $app;
