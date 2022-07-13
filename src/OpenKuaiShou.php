<?php

namespace Tb07\OpenKuaiShou;

use Hanson\Foundation\Foundation;
use Tb07\OpenKuaiShou\Model\KsApi;
use Tb07\OpenKuaiShou\Model\KsAuthApi;
use Tb07\OpenKuaiShou\Model\KsAuthorization;

/**
 * @property-read Http $http
 * @property-read Http1 $http1
 * @property-read KsApi $ksApi
 * @property-read KsAuthApi $ksAuthApi
 * @property-read KsAuthorization $ksAuthorization
 */
class OpenKuaiShou extends Foundation
{
    protected $openApiUrl = 'https://openapi.kwaixiaodian.com';
    protected $pcAuthUrl  = 'https://open.kwaixiaodian.com';
    protected $appAuthUrl = 'https://open.kuaishou.com';
    protected $providers  = [
        ServiceProvider::class,
    ];

    public function getAppKey()
    {
        return $this->getConfig('appKey');
    }

    public function getAppSecret()
    {
        return $this->getConfig('appSecret');
    }

    public function getSignSecret()
    {
        return $this->getConfig('signSecret');
    }

    public function getMessageSecretKey()
    {
        return $this->getConfig('messageSecretKey');
    }

    public function getOpenApiUrl()
    {
        return $this->openApiUrl;
    }

    public function getAppAuthUrl()
    {
        return $this->appAuthUrl;
    }

    public function getPcAuthUrl()
    {
        return $this->pcAuthUrl;
    }

    /*
     * 通用方法
     */
    public function request($requestMethod, $method, array $data, $accessToken = null)
    {
        return $this->http->exec($requestMethod, $method, $data, $accessToken);
    }


}