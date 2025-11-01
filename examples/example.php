<?php
require_once __DIR__ . '/../vendor/autoload.php';

use QuickLogPHP\QuickLog;

$log = new QuickLog();

$log->info("User logged in", ['username' => 'john_doe']);
$log->warning("Low disk space", ['available' => '500MB']);
$log->error("Email failed", ['to' => 'user@example.com']);
$log->debug("Session check", ['session_id' => session_id() ?? 'none']);

echo "Logs written successfully!";
