<?php

namespace OpenDota\Players;

use OpenDota\Kernel\BaseClient;

/**
 * Class ProPlayersClient.
 */
class ProPlayersClient extends BaseClient
{

    /**
     * 所有职业选手信息
     *
     * @return mixed
     */
    public function list()
    {
        return $this->httpGet("proPlayers");
    }


}
