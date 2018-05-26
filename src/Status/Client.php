<?php

namespace OpenDota\Status;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get current service statistics
     * @return mixed
     */
    public function status()
    {
        return $this->httpGet('status');
    }

    /**
     * Get API request metrics
     * @return mixed
     */
    public function apiMetrics()
    {
        return $this->httpGet('/admin/apiMetrics');
    }

}
