<?php

namespace JoSSte\Phpdockerapp\config;

class Database
{
    private static function loadEnv(): void
    {
        $envFile = __DIR__ . '/../../.env';
        if (!file_exists($envFile)) {
            $msg = '.env file not found';
            error_log(__METHOD__ . $msg);
            throw new \Exception($msg);
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                if (!isset($_ENV[$key])) {
                    putenv("$key=$value");
                }
            }
        }
    }

    public static function getConnection()
    {
        self::loadEnv();

        $dsn = 'mysql:dbname=' . getenv('DB_NAME') . ';host=' . getenv('DB_HOST');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');

        return new \PDO($dsn, $user, $password);
    }
}
