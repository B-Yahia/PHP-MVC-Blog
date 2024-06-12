<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\PostService;
use Framework\TemplateEngine;


class HomeController
{
    public function __construct(
        private TemplateEngine $templateEngine,
        private PostService $postService
    ) {
    }
    public function home()
    {
        $posts = $this->postService->getAll();
        echo $this->templateEngine->render("index.php", ['posts' => $posts]);
    }
    public function about()
    {
        echo $this->templateEngine->render("about.php", []);
    }

    public function deletePost()
    {
        $this->postService->deletePost($_POST['id']);
        redirectTo('/');
    }
}
