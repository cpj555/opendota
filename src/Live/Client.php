<?php

namespace OpenDota\Live;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Benchmarks of average stat values for a hero
     * @return mixed
     */
    public function live()
    {
        return $this->httpGet("live");
    }

}
