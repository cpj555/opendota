<?php

namespace OpenDota\Metadata;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['metadata'] = function ($app) {
            return new Client($app);
        };
    }
}
