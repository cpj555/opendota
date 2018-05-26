<?php

namespace OpenDota\Scenarios;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['scenarios'] = function ($app) {
            return new Client($app);
        };
    }
}
