<?php

namespace OpenKuaiShou\Tests\Unit;

use OpenKuaiShou\Tests\TestCase;

class KuaiShouTest extends TestCase
{
    protected $accessToken = 'tlbhJwOzQV1JvxfFqRo8afW4CeDrrzNKXzaCiucCAvFaE-g1B6L41e3hc6ix25lwNz9kaPRKWF9jIv6QTpslw9GzWG-wkFyt3C7tHsmr21R6q3s7eRbNfQCCABYgkANUbATeexjAMqHjR7hKR5g90wwPh3lBoSIEH75Kg-RaqlrUNstFhsUg4wIiAcMTq_QUsxhpsHG8XF1Hc0D1lQ8yqholch4KKy054OhSgFMAE';

    //团长查询招商活动列表
    public function testInvestmentActivityOpenList()
    {
        $params = [
            'offset' => 0,
            'limit'  => 100,
            //            'activityType'   => '活动类型',
            //            'activityId'     => '活动ID',
            //            'channelId'      => '频道ID',
            //            'activityStatus' => '活动状态',
            //            'activityTitle'  => '活动标题',
        ];
        $result  = $this->getApp()->ksAuthApi->investmentActivityOpenList($params, $this->accessToken);
        $this->assertOk($result);
    }

    //获取商家信息
    public function testOpenUserSeller()
    {
        $params = [];
        $result  = $this->getApp()->ksAuthApi->openUserSeller($params, $this->accessToken);
        $this->assertOk($result);
    }

    //获取 client_credentials 授权凭证 调用非授权open api 接口凭证
    public function testClientCredentials()
    {
        $result = $this->getApp()->ksAuthorization->clientCredentials();
        $this->assertOk($result);
    }

    //创建pc 授权
    public function testCreatePcAuthUrl()
    {
        $result = $this->getApp()->ksAuthorization->createPcAuthUrl('https://www.test.com/authorization');
        $this->assertOk([$result]);
    }

    //创建app 授权
    public function testcreateAppAuthUrl()
    {
        $result = $this->getApp()->ksAuthorization->createAppAuthUrl('https://www.test.com/authorization');
        $this->assertOk([$result]);
    }

    //获取授权凭证
    public function testTokenFromCode()
    {
        $result = $this->getApp()->ksAuthorization->tokenFromCode('7c94b0dba93aa4434335c4d3e9a1773dde919820c65b965a725ae9478b8569972aa00e0f');
        $this->assertOk($result);
    }

    //获取授权凭证
    public function testRefreshToken()
    {
        $result = $this->getApp()->ksAuthorization->refreshToken('7c94b0dba93aa4434335c4d3e9a1773dde919820c65b965a725ae9478b8569972aa00e0f');
        $this->assertOk($result);
    }

}