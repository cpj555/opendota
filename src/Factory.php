<?php

namespace OpenDota;

/**
 * Class Factory.
 * @method static \OpenDota\Application        (array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array $config
     *
     * @return \OpenDota\Kernel\ServiceContainer
     */
    public static function make($name, array $config)
    {
//        $namespace = Kernel\Support\Str::studly($name);
        $application = "\\OpenDota\\Application";
        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }

}