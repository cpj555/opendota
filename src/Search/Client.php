<?php

namespace OpenDota\Search;

use OpenDota\Kernel\BaseClient;
use OpenDota\Kernel\ServiceContainer;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Search players by personaname.(查找玩家通过用户名)
     * @param mixed $q
     * @return mixed
     */
    public function search($q)
    {
        $params = [
            'q'=>$q
        ];
        return $this->httpGet('search',$params);
    }

}
