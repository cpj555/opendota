<?php


namespace OpenDota\Kernel;

use OpenDota\Kernel\Contracts\AccessTokenInterface;
use OpenDota\Kernel\Exceptions\Exception;
use OpenDota\Kernel\Http\Response;
use OpenDota\Kernel\Traits\HasHttpRequests;
use GuzzleHttp\Client;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Monolog\Logger;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseClient.
 *
 * @author overtrue <i@overtrue.me>
 */
class BaseClient
{
    use HasHttpRequests {
        request as performRequest;
    }

    /**
     * @var \OpenDota\Kernel\ServiceContainer
     */
    protected $app;
    /**
     * @var
     */
    protected $baseUri;

    /**
     * BaseClient constructor.
     *
     * @param \OpenDota\Kernel\ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }

    /**
     * GET request.
     *
     * @param string $url
     * @param array $query
     *
     * @return \Psr\Http\Message\ResponseInterface|\OpenDota\Kernel\Support\Collection|array|object|string
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function httpGet(string $url, array $query = [])
    {
        return $this->request($url, 'GET', ['query' => $query]);
    }

    /**
     * POST request.
     *
     * @param string $url
     * @param array $data
     *
     * @return \Psr\Http\Message\ResponseInterface|\OpenDota\Kernel\Support\Collection|array|object|string
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function httpPost(string $url, array $data = [])
    {
        return $this->request($url, 'POST', ['form_params' => $data]);
    }

    /**
     * JSON request.
     *
     * @param string $url
     * @param string|array $data
     * @param array $query
     *
     * @return \Psr\Http\Message\ResponseInterface|\OpenDota\Kernel\Support\Collection|array|object|string
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function httpPostJson(string $url, array $data = [], array $query = [])
    {
        return $this->request($url, 'POST', ['query' => $query, 'json' => $data]);
    }

    /**
     * Upload file.
     *
     * @param string $url
     * @param array $files
     * @param array $form
     * @param array $query
     *
     * @return \Psr\Http\Message\ResponseInterface|\OpenDota\Kernel\Support\Collection|array|object|string
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function httpUpload(string $url, array $files = [], array $form = [], array $query = [])
    {
        $multipart = [];

        foreach ($files as $name => $path) {
            $multipart[] = [
                'name' => $name,
                'contents' => fopen($path, 'r'),
            ];
        }

        foreach ($form as $name => $contents) {
            $multipart[] = compact('name', 'contents');
        }

        return $this->request($url, 'POST', ['query' => $query, 'multipart' => $multipart, 'connect_timeout' => 30, 'timeout' => 30, 'read_timeout' => 30]);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @param bool $returnRaw
     *
     * @return \Psr\Http\Message\ResponseInterface|\OpenDota\Kernel\Support\Collection|array|object|string
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function request(string $url, string $method = 'GET', array $options = [], $returnRaw = false)
    {
        if (empty($this->middlewares)) {
            $this->registerHttpMiddlewares();
        }

        if ($api_key = $this->app->config->get('api_key')) {
            $options['query']['api_key'] = $api_key;
        }

        $response = $this->performRequest($url, $method, $options);

        return $returnRaw ? $response : $this->castResponseToType($response, $this->app->config->get('response_type'));
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     *
     * @return \OpenDota\Kernel\Http\Response
     *
     * @throws \OpenDota\Kernel\Exceptions\InvalidConfigException
     */
    public function requestRaw(string $url, string $method = 'GET', array $options = [])
    {
        return Response::buildFromPsrResponse($this->request($url, $method, $options, true));
    }

    /**
     * Return GuzzleHttp\Client instance.
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient(): Client
    {
        if (!($this->httpClient instanceof Client)) {
            $this->httpClient = $this->app['http_client'] ?? new Client();
        }

        return $this->httpClient;
    }

    /**
     * Register Guzzle middlewares.
     */
    protected function registerHttpMiddlewares()
    {
        // retry
        $this->pushMiddleware($this->retryMiddleware(), 'retry');
        // log
        $this->pushMiddleware($this->logMiddleware(), 'log');
    }

    /**
     * Log the request.
     *
     * @return \Closure
     */
    protected function logMiddleware()
    {
        $formatter = new MessageFormatter($this->app['config']['http.log_template'] ?? MessageFormatter::DEBUG);

        return Middleware::log($this->app['logger'], $formatter);
    }

    /**
     * Return retry middleware.
     *
     * @return \Closure
     */
    protected function retryMiddleware()
    {
        return Middleware::retry(function (
            $retries,
            RequestInterface $request,
            ResponseInterface $response = null
        ) {
            if (array_key_exists('X-Rate-Limit-Remaining-Month', $response->getHeaders()) && current($response->getHeader('X-Rate-Limit-Remaining-Month')) <= 0) {
                $this->app['logger']->debug('每月调用次数已达上线');
                throw new \ErrorException('每月调用次数已达上线');
            }
            if (current($response->getHeader('X-Rate-Limit-Remaining-Minute')) <= 0) {
                $this->app['logger']->debug('每分钟调用次数已达上线');
                throw new \ErrorException('每分钟调用次数已达上线');
            }

            return false;
            // Limit the number of retries to 2
//            if ($retries < $this->app->config->get('http.retries', 1) && $response && $body = $response->getBody()) {
//                $response = json_decode($body, true);
//                var_dump($response);
//                return true;
//            }

        }, function () {
            return abs($this->app->config->get('http.retry_delay', 5000));
        });
    }
}
