<?php

namespace OpenDota\Live;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['live'] = function ($app) {
            return new Client($app);
        };
    }
}
