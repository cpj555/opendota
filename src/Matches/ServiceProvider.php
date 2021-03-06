<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OpenDota\Matches;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['matches'] = function ($app) {
            return new MacthesClient($app);
        };

        $app['promatches'] = function ($app) {
            return new ProMatchesClient($app);
        };

        $app['publicmatches'] = function ($app) {
            return new PublicMatchesClient($app);
        };
    }
}
