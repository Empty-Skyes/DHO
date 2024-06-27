<?php

require_once '../models/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function loginUser($username, $password) {
        $user = $this->userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;
                return true;
            } else {
                return "Invalid password";
            }
        } else {
            return "Username not found";
        }
    }
}
