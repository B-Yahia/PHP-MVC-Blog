<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use App\Controllers\{HomeController, AuthController, PostController};
use Framework\App;
use function App\Config\regiterMiddleware;

$app = new App(__DIR__ . "/definition_container.php");

$app->get("/", [HomeController::class, 'home']);
$app->get("/about", [HomeController::class, 'about']);
$app->get("/login", [AuthController::class, 'loginPage']);
$app->get("/signup", [AuthController::class, 'signupPage']);
$app->get("/add_post", [PostController::class, 'addPost']);
$app->post("/signup", [AuthController::class, 'register']);

regiterMiddleware($app);

return $app;
