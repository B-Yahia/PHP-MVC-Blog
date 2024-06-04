<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class PostController
{

    public function __construct(private TemplateEngine $templateEngine)
    {
    }

    public function addPost()
    {
        echo $this->templateEngine->render("add_post.php", []);
    }
}
