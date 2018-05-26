<?php

namespace OpenDota\Health;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get service health data
     * @return mixed
     */
    public function health()
    {
        return $this->httpGet('health');
    }


}
