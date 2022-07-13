<?php

namespace Tb07\OpenKuaiShou\Model;


/**
 * 需要授权开放api
 * Class ksAuthApi
 * @package Tb07\OpenKuaiShou
 */
class ksAuthApi extends Module
{
    //获取商家信息
    public function openUserSeller(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.user.seller.get', $params, $accessToken);
        return $response;
    }
    //团长查询招商活动列表
    public function investmentActivityOpenList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.list', $params, $accessToken);
        return $response;
    }
}