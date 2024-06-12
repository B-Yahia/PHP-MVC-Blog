<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AuthController
{


    public function __construct(
        private TemplateEngine $templateEngine,
        private ValidatorService $validatorService,
        private UserService $userService,
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
        $this->userService->emailTaken($_POST['email']);
        $this->userService->usernameTaken($_POST['username']);
        $this->userService->create($_POST);
        redirectTo('/about');
    }

    public function login()
    {
        $this->validatorService->validateLoging($_POST);
        $this->userService->login($_POST);
        redirectTo('/');
    }

    public function logout()
    {
        $this->userService->logout();
        redirectTo('/login');
    }
}
