<?php

require_once '../models/UserModel.php';

class SignupController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function registerUser($username, $password, $passwordRepeat) {
        if (empty($username) || empty($password) || empty($passwordRepeat)) {
            return "All fields are required.";
        }

        if ($password !== $passwordRepeat) {
            return "Passwords do not match.";
        }

        $existingUser = $this->userModel->getUserByUsername($username);
        if ($existingUser) {
            return "Username already taken";
        }

        $success = $this->userModel->registerUser($username, $password);
        if ($success) {
            return "User registered successfully!";
        } else {
            return "Registration failed. Please try again.";
        }
    }
}