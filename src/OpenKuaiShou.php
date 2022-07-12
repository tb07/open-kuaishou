<?php

namespace Tb07\OpenKuaiShou;

use Hanson\Foundation\Foundation;

/**
 * @property-read Http $http
 *
 * @property-read KuaiShou $kuaiShou
 */
class OpenKuaiShou extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

    public function getSecret()
    {
        return $this->getConfig('appSecret');
    }

    public function getAppKey()
    {
        return $this->getConfig('appKey');
    }

    public function getSignSecret()
    {
        return $this->getConfig('signSecret');
    }

    public function getMessageSecretKey()
    {
        return $this->getConfig('messageSecretKey');
    }

    /*
     * 通用方法
     */
    public function request($requestMethod, $method, array $data, $accessToken = null)
    {
        return $this->http->exec($requestMethod, $method, $data, $accessToken);
    }


}