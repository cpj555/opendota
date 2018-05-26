<?php

namespace OpenDota\Players;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['players'] = function ($app) {
            return new Client($app);
        };

        $app['proplayers'] = function ($app) {
            return new ProPlayersClient($app);
        };
    }
}
