<?php

namespace OpenDota\Distributions;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Distributions of MMR data by bracket and country
     *
     * @return mixed
     */
    public function data()
    {
        return $this->httpGet("distributions");
    }

}
