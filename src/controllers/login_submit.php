<?php

require_once '../helpers/credentials.php';
require_once 'LoginController.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginController = new LoginController($conn);

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $loginResult = $loginController->loginUser($username, $password);

        if ($loginResult === true) {
            header("Location: ../helpers/osStartup.php");
            exit;
        } else {
            echo $loginResult;
        }
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}