<?php

namespace OpenDota\Matches;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     *
     * @param int $match_id
     *
     * @return mixed
     */
    public function match(int $match_id)
    {
        return $this->httpGet("matches/$match_id");
    }
}
