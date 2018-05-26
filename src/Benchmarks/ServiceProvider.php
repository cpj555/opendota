<?php

namespace OpenDota\Benchmarks;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['benchmarks'] = function ($app) {
            return new Client($app);
        };
    }
}
