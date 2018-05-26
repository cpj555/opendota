<?php

namespace OpenDota\Players;

use OpenDota\Kernel\BaseClient;

/**
 * Class PlayersClient.
 */
class PlayersClient extends BaseClient
{

    /**
     * 用户数据.
     * @param int $account_id
     *
     * @return mixed
     */
    public function data(int $account_id)
    {
        return $this->httpGet("players/$account_id");
    }

    /**
     *
     * @param int $account_id
     *
     * @return mixed
     */
    public function wl(int $account_id)
    {
        return $this->httpGet("players/$account_id/wl");
    }

    /**
     *
     * @param int $account_id
     *
     * @return mixed
     */
    public function recentMatches(int $account_id)
    {
        return $this->httpGet("players/$account_id/recentMatches");
    }

    /**
     *
     * @param int $account_id
     *
     * @return mixed
     */
    public function matches(int $account_id)
    {
        return $this->httpGet("players/$account_id/matches");
    }

    /**
     * Heroes played
     * @param int $account_id
     *
     * @return mixed
     */
    public function heroes(int $account_id)
    {
        return $this->httpGet("players/$account_id/heroes");
    }

    /**
     * Players played with
     * @param int $account_id
     *
     * @return mixed
     */
    public function peers(int $account_id)
    {
        return $this->httpGet("players/$account_id/peers");
    }

    /**
     * Pro players played with
     * @param int $account_id
     *
     * @return mixed
     */
    public function pros(int $account_id)
    {
        return $this->httpGet("players/$account_id/pros");
    }

    /**
     * Totals in stats
     * @param int $account_id
     *
     * @return mixed
     */
    public function totals(int $account_id)
    {
        return $this->httpGet("players/$account_id/totals");
    }

    /**
     * Counts in categories
     * @param int $account_id
     *
     * @return mixed
     */
    public function counts(int $account_id)
    {
        return $this->httpGet("players/$account_id/counts");
    }

    /**
     * Distribution of matches in a single stat
     * @param int $account_id
     *
     * @return mixed
     */
    public function histograms(int $account_id)
    {
        return $this->httpGet("players/$account_id/histograms");
    }

    /**
     * Wards placed in matches played
     * @param int $account_id
     *
     * @return mixed
     */
    public function wardmap(int $account_id)
    {
        return $this->httpGet("players/$account_id/wardmap");
    }

    /**
     * Words said/read in matches played
     * @param int $account_id
     *
     * @return mixed
     */
    public function wordcloud(int $account_id)
    {
        return $this->httpGet("players/$account_id/wordcloud");
    }

    /**
     * Player rating history
     * @param int $account_id
     *
     * @return mixed
     */
    public function ratings(int $account_id)
    {
        return $this->httpGet("players/$account_id/ratings");
    }

    /**
     * Player hero rankings
     * @param int $account_id
     *
     * @return mixed
     */
    public function rankings(int $account_id)
    {
        return $this->httpGet("players/$account_id/rankings");
    }

    /**
     * Refresh player match history
     * @param int $account_id
     *
     * @return mixed
     */
    public function refresh(int $account_id)
    {
        return $this->httpPost("players/$account_id/refresh");
    }

}
