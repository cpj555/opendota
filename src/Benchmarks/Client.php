<?php

namespace OpenDota\Benchmarks;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Benchmarks of average stat values for a hero
     * @param mixed $hero_id
     * @return mixed
     */
    public function hero($hero_id)
    {
        $params = [
            'hero_id'=>$hero_id
        ];
        return $this->httpGet('benchmarks',$params);
    }

}
