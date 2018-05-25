<?php

namespace OpenDota;

use OpenDota\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \OpenDota\Kernel\Config $config
 * @property \OpenDota\Matches\Client $matches
 *
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Matches\ServiceProvider::class,
    ];
}