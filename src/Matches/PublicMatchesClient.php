<?php

namespace OpenDota\Matches;

use OpenDota\Kernel\BaseClient;

/**
 * Class PublicMatchesClient.
 */
class PublicMatchesClient extends BaseClient
{

    /**
     * 随机获取公共比赛列表
     * @param int $mmr_ascending 天梯分升序？为啥需要两个
     * @param int $mmr_descending 天梯分降序？
     * @param int $less_than_match_id Get matches with a match ID lower than this value(过滤条件小于此比赛编号)
     *
     * @return mixed
     */
    public function list($mmr_ascending = null, $mmr_descending = null, $less_than_match_id = null)
    {
        $params = [
            'mmr_ascending' => $mmr_ascending,
            'mmr_descending' => $mmr_descending,
            'less_than_match_id' => $less_than_match_id
        ];

        return $this->httpGet("proMatches", $params);
    }
}
