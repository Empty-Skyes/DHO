<?php

require_once '../models/UserModel.php';

class LoginController {
    private UserModel $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function loginUser($username, $password): array
    {
        $user = $this->userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;
                return ['success' => true, 'message' => 'Login successful'];
            } else {
                return ['success' => false, 'message' => 'Invalid password'];
            }
        } else {
            return ['success' => false, 'message' => 'Username not found'];
        }
    }
}