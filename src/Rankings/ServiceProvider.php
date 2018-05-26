<?php

namespace OpenDota\Rankings;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['rankings'] = function ($app) {
            return new Client($app);
        };
    }
}
