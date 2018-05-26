<?php

namespace OpenDota\Records;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['records'] = function ($app) {
            return new Client($app);
        };
    }
}
