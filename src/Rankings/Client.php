<?php

namespace OpenDota\Rankings;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Top players by hero
     * @param mixed $hero_id
     * @return mixed
     */
    public function hero($hero_id)
    {
        $params = [
            'hero_id'=>$hero_id
        ];
        return $this->httpGet('hero_id',$params);
    }

}
