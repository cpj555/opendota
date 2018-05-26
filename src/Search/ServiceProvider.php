<?php

namespace OpenDota\Search;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['search'] = function ($app) {
            return new Client($app);
        };
    }
}
