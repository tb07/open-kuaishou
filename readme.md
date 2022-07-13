# open-kuaishou

## 安装 - install

```bash
$ composer require tb07/open-kuaishou
```

## 使用 - usage

```php
require 'vendor/autoload.php';

$app = new Tb07\OpenKuaiShou\OpenKuaiShou([  
            'debug' => true,
            'appKey' => 'your app key',
            'appSecret' => 'your app secret'
            'signSecret' => 'your sign Secret'
            'messageSecretKey' => 'your message Secret Key'
]);

// 创建授权
$app->kuaiShou->authTokenCreate();

// 部分API没有封装成具体方法，你也可以自行调用 request 方法
$app->request('请求方式','方法', ['参数'=> '值'],'授权凭证');
```

## 测试 - tests

1. 复制 phpunit.xml 配置文件
    ```bash
    $ cp example.phpunit.xml phpunit.xml
    ```
2. 修改配置文件环境变量部分
    ```xml
    <php>
        <env name="kuaiShou.appKey" value="your app key"/>
        <env name="kuaiShou.appSecret" value="your app secret"/>
        <env name="kuaiShou.signSecret" value="your sign Secret"/>
        <env name="kuaiShou.messageSecretKey" value="your message Secret Key"/>
        <env name="kuaiShou.adZoneId" value="your ad zone id"/>
    </php>
    ```
3. 执行测试用例
    ```bash
    $ vendor/bin/phpunit

