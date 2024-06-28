<?php

require_once '../helpers/credentials.php';
require_once 'SignupController.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $signupController = new SignupController($conn);

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $passwordRepeat = htmlspecialchars($_POST['passwordRepeat']);

        error_log("Signup attempt for username: $username");

        $signupResult = $signupController->registerUser($username, $password, $passwordRepeat);
        echo json_encode($signupResult);
    }
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error']);
} catch (Exception $e) {
    error_log("Unexpected error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Unexpected error']);
}
