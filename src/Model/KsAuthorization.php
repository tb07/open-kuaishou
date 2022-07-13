<?php

namespace Tb07\OpenKuaiShou\Model;


/**
 * 快手授权
 * Class KsAuthorization
 * @package Tb07\OpenKuaiShou
 */
class KsAuthorization extends Module
{

    //创建pc 授权地址
    public function createPcAuthUrl(string $redirectUri, array $scope = ['user_info'], string $state = 'code', string $responseType = 'code')
    {
        $scope   = implode(',', $scope);
        $authUrl = "{$this->app->getPcAuthUrl()}/oauth/authorize?app_id={$this->app->getAppKey()}&redirect_uri={$redirectUri}&scope={$scope}&response_type={$responseType}&state={$state}";
        return $authUrl;
    }

    //创建app 授权地址
    public function createAppAuthUrl(string $redirectUri, array $scope = ['user_info'], string $state = 'code', string $responseType = 'code')
    {
        $scope   = implode(',', $scope);
        $authUrl = "{$this->app->getAppAuthUrl()}/oauth2/authorize?app_id={$this->app->getAppKey()}&redirect_uri={$redirectUri}&scope={$scope}&response_type={$responseType}&state={$state}";
        return $authUrl;
    }

    //code 换取授权凭证
    public function tokenFromCode(string $code, string $grantType = 'code')
    {
        $tokenUrl = $this->app->getOpenApiUrl() . '/oauth2/access_token';
        $response = $this->app->http->get($tokenUrl, [
            'app_id'     => $this->app->getAppKey(),
            'grant_type' => $grantType,
            'code'       => $code,
            'app_secret' => $this->app->getAppSecret(),

        ]);
        return @json_decode((string)$response->getBody(), true);
    }

    //刷新授权凭证
    public function refreshToken(string $refreshToken, string $grantType = 'refresh_token')
    {
        $tokenUrl = $this->app->getOpenApiUrl() . '/oauth2/refresh_token';
        $response = $this->app->http->get($tokenUrl, [
            'app_id'        => $this->app->getAppKey(),
            'grant_type'    => $grantType,
            'refresh_token' => $refreshToken,
            'app_secret'    => $this->app->getAppSecret(),

        ]);
        return @json_decode((string)$response->getBody(), true);
    }

    //client_credentials 授权地址 调用非授权open api 接口凭证
    public function clientCredentials()
    {
        $tokenUrl = $this->app->getOpenApiUrl() . '/oauth2/access_token';
        $response = $this->app->http->get($tokenUrl, [
            'app_id'     => $this->app->getAppKey(),
            'grant_type' => 'client_credentials',
            'app_secret' => $this->app->getAppSecret(),
        ]);
        return @json_decode((string)$response->getBody(), true);
    }
}