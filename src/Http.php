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

    public function exec($requestMethod, $method, array $data = [], $accessToken = null)
    {
        switch ($requestMethod) {
            case 'POST':
                return $this->decodeResponse(
                    $this->post('https://openapi.kwaixiaodian.com', $this->buildParams($data, $method, $accessToken))
                );
                break;
            case 'GET':
                return $this->decodeResponse(
                    $this->get('https://openapi.kwaixiaodian.com', $this->buildParams($data, $method, $accessToken))
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
        $params         = array_merge($params, [
            'appkey'       => $this->app->getAppKey(),
            "timestamp"    => microtime(true),
            'version'      => '1',//请求的API版本号，目前版本为1
            'access_token' => $accessToken,    //所有需用户授权API使用code模式获取，不需要用户授权API使用client_credentials获取，详情参考《授权说明》文档
            "param"        => (is_array($params) && !empty($params)) ? json_encode($params) : '{}',//JSON 业务参数
            'method'       => $method,//请求方式
            'sign'         => 'json', //签名
            'signMethod'   => 'MD5', //支持HMAC_SHA256和MD5，推荐使用HMAC_SHA256
            'signSecret'   => $this->app->getSignSecret(),
        ]);
        $params['sign'] = $this->generateSign($params);
        unset($params['signSecret']);
        return $params;
    }

    protected function generateSign(array $attributes)
    {
        $attributes = array_filter(
            $attributes,
            function ($value) {
                return !empty($value);
            }
        );

        ksort($attributes);
        $string = '';
        foreach ($attributes as $key => $value) {
            $string .= "&$key=$value";
        }

        return md5($string);
    }
}