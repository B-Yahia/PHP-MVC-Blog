<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;

class AuthController
{


    public function __construct(
        private TemplateEngine $templateEngine,
        private ValidatorService $validatorService
    ) {
    }

    public function loginPage()
    {
        echo $this->templateEngine->render("login.php", []);
    }

    public function signupPage()
    {
        echo $this->templateEngine->render("signup.php", []);
    }

    public function register()
    {
        $this->validatorService->validate($_POST);
        echo "hello";
    }
}
