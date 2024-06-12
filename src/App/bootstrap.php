<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use App\Controllers\{HomeController, AuthController, PostController};
use Framework\App;
use function App\Config\regiterMiddleware;
use Dotenv\Dotenv;
use App\Middlewares\{GestOnlyMiddleware, AuthRequiredMiddleware};

$envvar = Dotenv::createImmutable(__DIR__ . "/../..");
$envvar->load();

$app = new App(__DIR__ . "/definition_container.php");

$app->get("/", [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
$app->get("/about", [HomeController::class, 'about']);
$app->get("/login", [AuthController::class, 'loginPage'])->add(GestOnlyMiddleware::class);
$app->get("/logout", [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
$app->get("/signup", [AuthController::class, 'signupPage'])->add(GestOnlyMiddleware::class);
$app->get("/add_post", [PostController::class, 'addPostView'])->add(AuthRequiredMiddleware::class);
$app->get("/post", [PostController::class, 'postView']);
$app->post("/signup", [AuthController::class, 'register']);
$app->post("/login", [AuthController::class, 'login']);
$app->post("/add_post", [PostController::class, 'addPost']);
$app->post("/post", [PostController::class, 'addComment']);
$app->delete("/", [HomeController::class, 'deletePost']);
$app->delete("/post", [PostController::class, 'deleteComment']);

regiterMiddleware($app);

return $app;
