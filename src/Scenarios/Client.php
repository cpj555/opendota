<?php

namespace OpenDota\Scenarios;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Benchmarks of average stat values for a hero
     * @param $item
     * @param mixed $hero_id
     * @return mixed
     */
    public function itemTimings($item,$hero_id)
    {
        $params = [
            'item'=>$item,
            'hero_id'=>$hero_id
        ];
        return $this->httpGet('scenarios/itemTimings',$params);
    }

    /**
     * Win rates for heroes in certain lane roles
     * @param $lane_role
     * @param mixed $hero_id
     * @return mixed
     */
    public function laneRoles($lane_role,$hero_id)
    {
        $params = [
            'lane_role'=>$lane_role,
            'hero_id'=>$hero_id
        ];
        return $this->httpGet('scenarios/itemTimings',$params);
    }

    /**
     * Miscellaneous team scenarios
     * @param $scenario
     * @return mixed
     */
    public function misc($scenario)
    {
        $params = [
            'scenario'=>$scenario,
        ];
        return $this->httpGet('scenarios/misc',$params);
    }

}
