<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{

    public function __construct(private Database $db)
    {
    }

    public function emailTaken(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE email= :email",
            ['email' => $email]
        )->count();
        if ($emailCount > 0) {
            throw new ValidationException(["email" => ["The email already used"]]);
        }
    }

    public function usernameTaken(string $username)
    {
        $UsernameCount = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE username= :username",
            ['username' => $username]
        )->count();
        if ($UsernameCount > 0) {
            throw new ValidationException(["username" => ["The username already used"]]);
        }
    }

    public function create(array $userInfo)
    {
        $userInfo['password'] = password_hash($userInfo['password'], PASSWORD_BCRYPT);
        $this->db->query(
            "INSERT INTO users (first_name,last_name,username,email,password,dob) 
            VALUES(:first_name,:last_name,:username,:email,:password,:dob)",
            [
                'first_name' => $userInfo['first_name'],
                'last_name' => $userInfo['last_name'],
                'username' => $userInfo['username'],
                'email' => $userInfo['email'],
                'password' => $userInfo['password'],
                'dob' => $userInfo['dob'],
            ]
        );
        session_regenerate_id();
        $_SESSION['user'] = $this->db->id();
    }

    public function login(array $userInfo)
    {
        $user = $this->db->query(
            "SELECT id,username,password FROM users where username = :username ",
            ['username' => $userInfo['username']]
        )->find();
        $passwordMatch = password_verify($userInfo['password'], $user['password'] ?? "");
        if (!$passwordMatch || !$user) {
            throw new ValidationException(['password' => ['Invalid Credentiels']]);
        }
        session_regenerate_id();
        $_SESSION['user'] = $user['id'];
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_regenerate_id();
    }
}
