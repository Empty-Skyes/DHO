<?php
session_start();
$servername = "db";
$username = "root";
$password = "password";
$dbname = "dho";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;

                header("Location: ../helpers/osStartUp.php");

                exit;
            } else {
                $error_message = "Invalid password";
            }
        } else {
            $error_message = "Username not found";
        }
        echo $error_message;
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}