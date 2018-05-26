<?php

namespace OpenDota\Schema;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get database schema
     * @return mixed
     */
    public function schema()
    {
        return $this->httpGet('schema');
    }

}
