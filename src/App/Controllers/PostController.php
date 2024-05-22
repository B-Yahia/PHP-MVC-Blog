<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class PostController
{
    private TemplateEngine $templateEngine;

    public function __construct()
    {
        $this->templateEngine = new TemplateEngine(__DIR__ . "/../views");
    }

    public function addPost()
    {
        $this->templateEngine->render("add_post.php", ['title' => 'Add a post']);
    }
}
