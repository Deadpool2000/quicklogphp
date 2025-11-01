<?php
namespace QuickLogPHP;

class QuickLog
{
    private $logFile;
    public function __construct($logFile = __DIR__ . '/../logs/app.log')
    {
        $this->logFile = $logFile;
        // Check log directory exists
        $dir = dirname($logFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
    public function log($level, $message, $data = null)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = $this->getClientIP();
        $userAgent = $this->getUserAgent();
        if ($data !== null) {
            if (is_array($data) || is_object($data)) {
                $data = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }
            $message .= " | {$data}";
        }
        $logEntry = "[{$datetime}]:[{$ip}]:[{$userAgent}]:[{$level}]:{$message}" . PHP_EOL;
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }
    public function info($message, $data = null)    { $this->log('INFO', $message, $data); }
    public function warning($message, $data = null) { $this->log('WARNING', $message, $data); }
    public function error($message, $data = null)   { $this->log('ERROR', $message, $data); }
    public function debug($message, $data = null)   { $this->log('DEBUG', $message, $data); }
    private function getClientIP()
    {
        if (php_sapi_name() === 'cli') return 'CLI';
        return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
    }
    private function getUserAgent()
    {
        if (php_sapi_name() === 'cli') return 'CLI';
        return $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
    }
}
