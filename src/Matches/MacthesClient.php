<?php

namespace OpenDota\Matches;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class MacthesClient extends BaseClient
{

    /**
     * 指定比赛编号数据
     * @param int $match_id
     *
     * @return mixed
     */
    public function data(int $match_id)
    {
        return $this->httpGet("matches/$match_id");
    }
}
