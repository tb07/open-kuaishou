<?php

namespace OpenKuaiShou\Tests\Unit;

use OpenKuaiShou\Tests\TestCase;

class KuaiShouTest extends TestCase
{
    public function testItemRecommends()
    {
        ($result = $this->getApp()->kuaiShou->authTokenCreate());

        $this->assertOk($result);
    }


}