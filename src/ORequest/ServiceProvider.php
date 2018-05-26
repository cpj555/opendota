<?php

namespace OpenDota\ORequest;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['orequest'] = function ($app) {
            return new Client($app);
        };
    }
}
