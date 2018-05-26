<?php

namespace OpenDota\Status;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['status'] = function ($app) {
            return new Client($app);
        };
    }
}
