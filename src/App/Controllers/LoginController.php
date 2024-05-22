<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class LoginController
{
    private TemplateEngine $templateEngine;

    public function __construct()
    {
        $this->templateEngine = new TemplateEngine(__DIR__ . "/../views");
    }

    public function loginPage()
    {
        $this->templateEngine->render("login.php", ['title' => 'Login']);
    }

    public function signupPage()
    {
        $this->templateEngine->render("signup.php", ['title' => 'Signup']);
    }
}
