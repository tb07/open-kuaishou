<?php

namespace OpenKuaiShou\Tests;

use Tb07\OpenKuaiShou\OpenKuaiShou;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $app;


    public function getApp()
    {
        return $this->app ?: $this->app = new OpenKuaiShou([
            'debug'            => true,
            'appKey'           => getenv('kuaiShou.appKey'),
            'appSecret'        => getenv('kuaiShou.appSecret'),
            'signSecret'       => getenv('kuaiShou.signSecret'),
            'messageSecretKey' => getenv('kuaiShou.messageSecretKey'),
        ]);
    }

    public function assertOk(array $result)
    {
        if (!isset($result['error_msg']) || empty($result['error_msg'])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false, $result['sub_msg'] ?? $result['error_msg'] ?? $result['error'] ?? '');
        }

    }
}