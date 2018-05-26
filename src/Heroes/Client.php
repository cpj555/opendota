<?php

namespace OpenDota\Heroes;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get hero data
     * @return mixed
     */
    public function data()
    {
        return $this->httpGet('heroes');
    }

    /**
     * Get recent matches with a hero
     * @param mixed $hero_id
     * @return mixed
     */
    public function recent_matches($hero_id)
    {
        return $this->httpGet("/heroes/{$hero_id}/matches");
    }

    /**
     * Get recent matches with a hero
     * @param mixed $hero_id
     * @return mixed
     */
    public function against($hero_id)
    {
        return $this->httpGet("/heroes/{$hero_id}/matchups");
    }

    /**
     * Get hero performance over a range of match durations
     * @param mixed $hero_id
     * @return mixed
     */
    public function performance($hero_id)
    {
        return $this->httpGet("/heroes/{$hero_id}/durations");
    }

    /**
     * Get players who have played this hero
     * @param mixed $hero_id
     * @return mixed
     */
    public function players($hero_id)
    {
        return $this->httpGet("/heroes/{$hero_id}/players");
    }

    /**
     * Get players who have played this hero
     * @return mixed
     */
    public function stats()
    {
        return $this->httpGet("/heroStats");
    }

}
