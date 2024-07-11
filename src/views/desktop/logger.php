<?php

include_once 'controllers/LogController.php';

$controller = new LogController();
$controller->logRequest();
$logs = $controller->showLogs();
$errorLogs = $controller->showErrorLogs();

echo htmlspecialchars($logs);
echo htmlspecialchars($errorLogs);