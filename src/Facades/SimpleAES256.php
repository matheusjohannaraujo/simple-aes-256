<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/simple-aes-256
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-20
*/

namespace MJohann\Packlib\Facades;

use MJohann\Packlib\SimpleAES256 as SimpleAES256Class;

class SimpleAES256
{
    protected static ?SimpleAES256Class $instance = null;

    /**
     * Configures AES256 parameter.
     *
     * @param string $key
     * @return SimpleAES256
     */
    public static function init(): ?SimpleAES256Class
    {
        if (is_null(self::$instance)) {
            $reflection = new \ReflectionClass(SimpleAES256Class::class);
            self::$instance = $reflection->newInstanceArgs(func_get_args());
        }
        return self::$instance;
    }

    private static function getInstance(): ?SimpleAES256Class
    {
        if (is_null(self::$instance)) {
            throw new \Exception("Facade not initialized. Use \MJohann\Packlib\Facades\SimpleAES256::init([...]) first.");
        }

        return self::$instance;
    }

    public static function __callStatic($method, $arguments)
    {
        $instance = self::getInstance();

        if (!method_exists($instance, $method)) {
            throw new \BadMethodCallException("Method {$method} not exist in SimpleAES256.");
        }

        return $instance->$method(...$arguments);
    }
}
