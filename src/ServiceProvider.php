<?php


namespace Tb07\OpenKuaiShou;

use Pimple\Container;
use Tb07\OpenKuaiShou\Model\ksApi;
use Pimple\ServiceProviderInterface;
use Tb07\OpenKuaiShou\Model\ksAuthApi;
use Tb07\OpenKuaiShou\Model\KsAuthorization;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['http']  = function (OpenKuaiShou $openKuaiShou) {
            return new Http($openKuaiShou);
        };
        $pimple['ksApi']           = function (OpenKuaiShou $openKuaiShou) {
            return new ksApi($openKuaiShou);
        };
        $pimple['ksAuthApi']       = function (OpenKuaiShou $openKuaiShou) {
            return new ksAuthApi($openKuaiShou);
        };
        $pimple['ksAuthorization'] = function (OpenKuaiShou $openKuaiShou) {
            return new KsAuthorization($openKuaiShou);
        };
    }

}