<?php

namespace Tb07\OpenKuaiShou;


abstract class Module
{
    protected $app;

    public function __construct(OpenKuaiShou $app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param array $data
     * @return array
     */
    public function exec($requestMethod, $method, array $data = [], $accessToken = null)
    {
        return $this->app->http->exec($requestMethod, $method, $data, $accessToken);
    }
}