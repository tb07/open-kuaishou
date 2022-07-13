<?php


namespace Tb07\OpenKuaiShou;


use Psr\Http\Message\ResponseInterface;

class Http extends \Hanson\Foundation\Http
{
    /** @var OpenKuaiShou */
    protected $app;

    public function __construct(OpenKuaiShou $app)
    {
        $this->app = $app;
    }

    public function exec($requestMethod, $method, array $params = [], $accessToken = null)
    {
        $routing = '/' . strtr($method, '.', '/');
        switch ($requestMethod) {
            case 'POST':
                return $this->decodeResponse(
                    $this->post($this->app->getOpenApiUrl() . $routing, $this->buildParams($params, $method, $accessToken))
                );
                break;
            case 'GET':
                return $this->decodeResponse(
                    $this->get($this->app->getOpenApiUrl() . $routing, $this->buildParams($params, $method, $accessToken))
                );
                break;
        }
    }

    protected function decodeResponse(ResponseInterface $response)
    {
        return @json_decode((string)$response->getBody(), true);
    }

    protected function buildParams(array $params, $method, $accessToken = null): array
    {
        $params         = [
            'appkey'       => $this->app->getAppKey(),
            "timestamp"    => intval(microtime(true) * 1000),
            'version'      => 1,//请求的API版本号，目前版本为1
            'access_token' => $accessToken,    //所有需用户授权API使用code模式获取，不需要用户授权API使用client_credentials获取，详情参考《授权说明》文档
            "param"        => (is_array($params) && !empty($params)) ? json_encode($params) : '{}',//JSON 业务参数
            'method'       => $method,//请求方式
            'signMethod'   => 'MD5', //支持HMAC_SHA256和MD5，推荐使用HMAC_SHA256
        ];
        $params['sign'] = $this->generateSign($params, $this->app->getSignSecret());
        return $params;
    }

    protected function generateSign(array $attributes, string $signSecret)
    {
        $attributes = array_filter(
            $attributes,
            function ($value) {
                return !empty($value);
            }
        );
        ksort($attributes);

        $stringToBeSigned = '';
        foreach ($attributes as $key => $value) {
            if ($stringToBeSigned) {
                $stringToBeSigned .= "&$key=$value";
            } else {
                $stringToBeSigned .= "$key=$value";
            }
        }
        $stringToBeSigned .= "&signSecret={$signSecret}";
        unset($k, $v);
        return md5($stringToBeSigned);
    }
}