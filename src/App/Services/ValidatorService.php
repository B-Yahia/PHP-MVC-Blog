<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{RequiredRule, EmailRule, MinRule, MatchRule};
use Framework\Validator;
use DateTime;

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add("required", new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
        $this->validator->add('match', new MatchRule());
    }
    public function validate(array $formData)
    {
        $formData['age'] = $this->getAgeFromDOB($formData['dob']);
        $this->validator->validate($formData, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm_password' => ['required', 'match:password'],
            'dob' => ['required'],
            'age' => ['min:18']
        ]);
    }

    public function validateLoging(array $formData)
    {
        $this->validator->validate($formData, [
            'username' => ['required'],
            'password' => ['required'],
        ]);
    }

    public function getAgeFromDOB(string $dateOfBirth): int
    {
        $birthDate = new DateTime($dateOfBirth);
        $currentDate = new DateTime();
        $ageInterval = $currentDate->diff($birthDate);
        return $ageInterval->y;
    }

    public function validatePost(array $formData)
    {
        $this->validator->validate($formData, [
            'title' => ['required'],
            'content' => ['required'],
        ]);
    }

    public function validateComment(array $formData)
    {
        $this->validator->validate($formData, [
            'comment_name' => ['required'],
            'comment_email' => ['required', 'email'],
            'comment_text' => ['required']
        ]);
    }
}
