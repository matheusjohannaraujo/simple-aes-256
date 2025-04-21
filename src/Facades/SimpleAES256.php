<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/simple-aes-256
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-21
*/

namespace MJohann\Packlib\Facades;

use MJohann\Packlib\SimpleAES256 as SimpleAES256Class;

/**
 * Facade for the SimpleAES256 providing static access to SimpleAES256 operations.
 *
 * @method static void init(string $key = "AES_256") Initializes a new SimpleAES256.
 * @method static SimpleAES256 getInstance() Retrieves the current SimpleAES256 instance.
 * @method static mixed __callStatic(string $method, array $arguments) Dynamically calls a method on the SimpleAES256 instance.
 */
class SimpleAES256
{
    protected static ?SimpleAES256Class $instance = null;

    /**
     * Initializes a new SimpleAES256 configuration.
     *
     * @param string $key SimpleAES256 encryption/decryption key
     *
     * @return void
     */
    public static function init(): void
    {
        if (is_null(self::$instance)) {
            $reflection = new \ReflectionClass(SimpleAES256Class::class);
            self::$instance = $reflection->newInstanceArgs(func_get_args());
        }
    }

    /**
     * Returns the singleton instance of SimpleAES256.
     * Throws an exception if the instance has not been initialized.
     *
     * @throws \Exception
     * @return SimpleAES256
     */
    public static function getInstance(): SimpleAES256Class
    {
        if (is_null(self::$instance)) {
            throw new \Exception("Facade not initialized. Use \MJohann\Packlib\Facades\SimpleAES256::init([...]) first.");
        }

        return self::$instance;
    }

    /**
     * Magic method to forward static calls to the underlying SimpleAES256 instance.
     * If the method does not exist on the instance, a BadMethodCallException is thrown.
     *
     * @param string $method
     * @param array $arguments
     * @throws \BadMethodCallException
     * @return mixed
     */
    public static function __callStatic($method, $arguments): mixed
    {
        $instance = self::getInstance();

        if (!method_exists($instance, $method)) {
            throw new \BadMethodCallException("Method {$method} not exist in SimpleAES256.");
        }

        return $instance->$method(...$arguments);
    }
}
