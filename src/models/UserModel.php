<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($username, $password): bool
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashedPassword]);

            return true;
        } catch (PDOException $e) {
            error_log("Database error during user registration: " . $e->getMessage());
            return false;
        }
    }

    public function getUserByUsername($username) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error during fetching user: " . $e->getMessage());
            return null;
        }
    }
}