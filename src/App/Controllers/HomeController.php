<?php

declare(strict_types=1);

namespace App\Controllers;

include "../../../vendor/autoload.php";

use Framework\TemplateEngine;


class HomeController
{
    private TemplateEngine $templateEngine;

    public function __construct()
    {
        $this->templateEngine = new TemplateEngine(__DIR__ . "/../views");
    }
    public function home()
    {
        $this->templateEngine->render("index.php", ['title' => 'home']);
    }
}
