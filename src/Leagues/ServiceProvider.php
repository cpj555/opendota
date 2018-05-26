<?php

namespace OpenDota\Leagues;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['leagues'] = function ($app) {
            return new Client($app);
        };
    }
}
