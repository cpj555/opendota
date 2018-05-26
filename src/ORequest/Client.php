<?php

namespace OpenDota\ORequest;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Get parse request state
     * @param string $jobId
     * @return mixed
     */
    public function get(string $jobId)
    {
        return $this->httpGet("/request/{$jobId}");
    }

    /**
     * Submit a new parse request
     * @param string $jobId
     * @return mixed
     */
    public function submit(string $jobId)
    {
        return $this->httpPost("/request/{$jobId}");
    }


}
