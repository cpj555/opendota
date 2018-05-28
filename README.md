# opendota
opendota api接口
借鉴easywechat的设计模式



<p align="center">
<a href="https://www.opendota.com/">
<img src="https://www.opendota.com/assets/images/home-background.png" alt="EasyWeChat" width="320">
</a>

<p align="center">📦 It is  the SDK for opendota API</p>


## Requirement

1. PHP >= 7.0.0
2. **[composer](https://getcomposer.org/)**
3. openssl 拓展

> SDK 对所使用的框架并无特别要求

## Installation

```shell
composer require "losingbattle/opendota" -vvv
```

## Usage

基本使用（以服务端为例）:

```php
<?php

use OpenDota\Application;

$options = [
    'api_key'     => 'xxx', (选填 在官网申请后使用 取消每天调用次数限制),
    'log' => [
        'file' => __DIR__.'/opendota.log',
    ],
    'http' => [
        'retry'=>2
    ],
];

$app = new Application($options);

$heros = $app->heros;
$teams = $app->teams;
(其他接口参考文档和phpstrom ctrl跳进去看 - -)
$heros->data();
$heros->recent_matches($hero_id);
```

## Documentation

- OpenDota官网 https://www.opendota.com/
- OpenDota官方文档: https://docs.opendota.com 

## License

MIT
