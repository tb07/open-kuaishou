<?php

namespace OpenKuaiShou\Tests;

use Tb07\OpenKuaiShou\OpenKuaiShou;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $app;


    public function getApp()
    {
        return $this->app ?: $this->app = new OpenKuaiShou([
            'debug' => true,
            'appKey' => getenv('kuaiShou.appKey'),
            'appSecret' => getenv('kuaiShou.appSecret'),
            'signSecret' => getenv('kuaiShou.signSecret'),
            'messageSecretKey' => getenv('kuaiShou.messageSecretKey'),
        ]);
    }

    public function assertOk(array $result)
    {
        if (empty($result['error_response'])) {
            $this->assertTrue(true);
        } else {
            var_dump($result);
            $this->assertTrue(false, $result['error_response']['sub_msg'] ?? $result['error_response']['msg']);
        }

    }
}