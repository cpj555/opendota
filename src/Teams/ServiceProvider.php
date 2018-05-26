<?php

namespace OpenDota\Teams;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['teams'] = function ($app) {
            return new Client($app);
        };
    }
}
