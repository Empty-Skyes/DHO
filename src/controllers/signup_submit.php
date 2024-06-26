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

        $message = $signupController->registerUser($username, $password, $passwordRepeat);
        echo $message;
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}