<?php

namespace OpenDota\Heroes;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['heroes'] = function ($app) {
            return new Client($app);
        };
    }
}
