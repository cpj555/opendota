<?php

require_once '../vendor/autoload.php';

//$pimple = new \Pimple\Container();
//
//$pimple['http_client'] = function ($app) {
//    return new \GuzzleHttp\Client();
//};

$application = new \OpenDota\Application(['api_key'=>1]);

$application->getConfig();

//\OpenDota\Factory::

try{
    echo (json_encode($application->matches->match(0)));
}catch (\Exception $exception){
    var_dump($exception->getMessage());
}
