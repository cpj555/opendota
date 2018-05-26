<?php

namespace OpenDota\Health;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['health'] = function ($app) {
            return new Client($app);
        };
    }
}
