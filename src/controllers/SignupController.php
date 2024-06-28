<?php

require_once '../models/UserModel.php';

class SignupController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function registerUser($username, $password, $passwordRepeat) {
        if (empty($username) || empty($password) || empty($passwordRepeat)) {
            return ['success' => false, 'message' => 'All fields are required.'];
        }

        if ($password !== $passwordRepeat) {
            return ['success' => false, 'message' => 'Passwords do not match.'];
        }

        $existingUser = $this->userModel->getUserByUsername($username);
        if ($existingUser) {
            return ['success' => false, 'message' => 'Username already taken.'];
        }

        $success = $this->userModel->registerUser($username, $password);
        if ($success) {
            return ['success' => true, 'message' => 'User registered successfully!'];
        } else {
            return ['success' => false, 'message' => 'Registration failed. Please try again.'];
        }
    }
}