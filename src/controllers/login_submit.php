<?php

require_once '../helpers/credentials.php';
require_once '../models/UserModel.php';
require_once 'LoginController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $loginController = new LoginController($conn);

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        error_log("Login attempt for username: $username");

        $loginResult = $loginController->loginUser($username, $password);

        if ($loginResult['success']) {
            echo json_encode(['success' => true, 'message' => 'Login successful']);
        } else {
            echo json_encode(['success' => false, 'message' => $loginResult['message']]);
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Database error']);
    } catch (Exception $e) {
        error_log("Unexpected error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Unexpected error']);
    }
}