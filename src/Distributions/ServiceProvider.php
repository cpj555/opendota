<?php

namespace OpenDota\Distributions;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['distributions'] = function ($app) {
            return new Client($app);
        };
    }
}
