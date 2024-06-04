<?php

declare(strict_types=1);

namespace App\Controllers;

include __DIR__ . "/../../../vendor/autoload.php";

use Framework\TemplateEngine;


class HomeController
{
    public function __construct(
        private TemplateEngine $templateEngine
    ) {
    }
    public function home()
    {
        echo $this->templateEngine->render("index.php", []);
    }
    public function about()
    {
        echo $this->templateEngine->render("about.php", []);
    }
}
