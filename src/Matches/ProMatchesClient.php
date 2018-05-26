<?php

namespace OpenDota\Matches;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class ProMatchesClient extends BaseClient
{

    /**
     * @param int $less_than_match_id     Get matches with a match ID lower than this value(过滤条件小于此比赛编号)
     *
     * @return mixed
     */
    public function list($less_than_match_id = null)
    {
        $params = [
            'less_than_match_id' => $less_than_match_id,
        ];

        return $this->httpGet("proMatches", $params);
    }
}
