<?php

namespace OpenDota\Replays;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Benchmarks of average stat values for a hero
     * @param mixed $match_id
     * @return mixed
     */
    public function Replays(array $match_id)
    {
        $params = [
            'match_id' => $match_id
        ];
        return $this->httpGet('replays', $params);
    }

}
