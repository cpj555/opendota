<?php

namespace OpenDota\Replays;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['replays'] = function ($app) {
            return new Client($app);
        };
    }
}
