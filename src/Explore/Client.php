<?php

namespace OpenDota\Explore;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * 输入sql查询pgsql数据
     * @param string $sql
     *
     * @return mixed
     */
    public function sql(string $sql)
    {
        $params = [
            'sql' => $sql
        ];
        return $this->httpGet("explorer", $params);
    }
}
