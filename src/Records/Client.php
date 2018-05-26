<?php

namespace OpenDota\Records;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Benchmarks of average stat values for a hero
     * @param mixed $field
     * @return mixed
     */
    public function records($field)
    {
        return $this->httpGet("/records/{$field}");
    }

}
