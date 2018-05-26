<?php

namespace OpenDota\Schema;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['schema'] = function ($app) {
            return new Client($app);
        };
    }
}
