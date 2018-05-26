<?php

namespace OpenDota\Metadata;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * Site metadata
     *
     * @return mixed
     */
    public function metadata()
    {
        return $this->httpGet("metadata");
    }

    public function __invoke()
    {
        return $this->metadata();
    }
}
