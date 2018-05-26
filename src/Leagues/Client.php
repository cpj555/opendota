<?php

namespace OpenDota\Leagues;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get league data
     * @return mixed
     */
    public function data()
    {
        return $this->httpGet('leagues');
    }

}
