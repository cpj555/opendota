<?php

namespace OpenDota\Explore;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['explore'] = function ($app) {
            return new Client($app);
        };
    }
}
