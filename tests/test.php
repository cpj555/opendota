<?php

require_once '../vendor/autoload.php';

//$pimple = new \Pimple\Container();
//
//$pimple['http_client'] = function ($app) {
//    return new \GuzzleHttp\Client();
//};
$application = new \OpenDota\Application([
    'api_key' => 1,
    'log' => [
        'level' => 'debug',
        'file' => __DIR__.'/wechat.log',
    ],
    'http' => [
        'retry'=>2
    ],
]);

$application->getConfig();

//\OpenDota\Factory::

try {
    echo(json_encode($application->heroes->data()));
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
