<?php


namespace Tb07\OpenKuaiShou;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['http'] = function (OpenKuaiShou $openTaobao) {
            return new Http($openTaobao);
        };

        $pimple['kuaiShou'] = function (OpenKuaiShou $openTaobao) {
            return new KuaiShou($openTaobao);
        };
    }

}