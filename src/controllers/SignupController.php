<?php

require_once '../models/UserModel.php';

class SignupController {
    private UserModel $userModel;

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

        /*
        if (!$this->isPasswordComplex($password)) {
            return ['success' => false, 'message' => 'Password does not meet complexity requirements.'];
        }
        */

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

    private function isPasswordComplex($password)
    {
        $length = strlen($password) >= 8;
        $upper = preg_match('@[A-Z]@', $password);
        $lower = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $special = preg_match('@\W@', $password);

        return $length && $upper && $lower && $number && $special;
    }
}
