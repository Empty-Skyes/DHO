<?php


class Logger
{
    private string $logFile;
    private string $errorLogFile;

    public function __construct()
    {
        $this->logFile = 'logs/logs.txt';
        $this->errorLogFile = 'logs/error_logs.txt';
    }

    public function log($data): void
    {
        $current = '';
        if (file_exists($this->logFile)) {
            $current = file_get_contents($this->logFile);
        }
        $current .= $data . "\n";
        file_put_contents($this->logFile, $current);
    }

    public function logError($error): void
    {
        $current = '';
        if (file_exists($this->errorLogFile)) {
            $current = file_get_contents($this->errorLogFile);
        }
        $current .= $error . "\n";
        file_put_contents($this->errorLogFile, $current);
    }

    public function getLogs(): false|string
    {
        return file_exists($this->logFile) ? file_get_contents($this->logFile) : 'Log file not found.';
    }

    public function getErrorLogs(): false|string
    {
        return file_exists($this->errorLogFile) ? file_get_contents($this->errorLogFile) : 'Error log file not found.';
    }
}