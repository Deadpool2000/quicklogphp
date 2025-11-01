# QuickLogPHP

A lightweight PHP logger that records datetime, IP address, user agent, and message details — all in a single line.

```
[datetime]:[ip]:[useragent]:[level]:message
```

## Installation

```bash
composer require Deadpool2000/quicklogphp
```

## Usage

```php
use QuickLogPHP\QuickLog;

$log = new QuickLog();

$log->info("User logged in", ["username" => "john_doe"]);
$log->error("Database connection failed", ["db_host" => "localhost"]);
```

### Example Output

```
[2025-10-31 18:10:45]:[192.168.1.10]:[Mozilla/5.0]:[INFO]:User logged in | {"username":"john_doe"}
[2025-10-31 18:11:15]:[192.168.1.10]:[Mozilla/5.0]:[ERROR]:Database connection failed | {"db_host":"localhost"}
```

## 🧾 License

MIT
