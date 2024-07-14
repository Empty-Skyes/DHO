<?php
include_once 'models/LogModel.php';

class LogController {
    private Logger $logger;

    public function __construct() {
        $this->logger = new Logger();
    }

    public function logRequest(): void
    {
        $requestData = 'Request URI: ' . $_SERVER['REQUEST_URI'];
        $this->logger->log($requestData);
    }

    public function logError($error): void
    {
        $this->logger->logError($error);
    }

    public function showLogs(): false|string
    {
        return $this->logger->getLogs();
    }

    public function showErrorLogs(): false|string
    {
        return $this->logger->getErrorLogs();
    }
}