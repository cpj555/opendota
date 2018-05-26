<?php

namespace OpenDota\Teams;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get team data
     * @param $team_id
     * @return mixed
     */
    public function data($team_id = null)
    {
        if ($team_id) {
            return $this->httpGet("teams/{$team_id}");
        }
        return $this->httpGet('teams');
    }

    /**
     * Get matches for a team
     * @param $team_id
     * @return mixed
     */
    public function matches($team_id)
    {
        return $this->httpGet("teams/{$team_id}/matches");
    }

    /**
     * Get matches for a team
     * @param $team_id
     * @return mixed
     */
    public function players($team_id)
    {
        return $this->httpGet("teams/{$team_id}/players");
    }

    /**
     * Get matches for a team
     * @param $team_id
     * @return mixed
     */
    public function heroes($team_id)
    {
        return $this->httpGet("teams/{$team_id}/heroes");
    }

}
