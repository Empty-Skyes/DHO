<?php

use JetBrains\PhpStorm\NoReturn;

class LogoutController {
    #[NoReturn] public function logout(): void
    {
        session_start();

        $_SESSION = array();

        session_destroy();

        header("Location: ../index.php");
        exit;
    }
}