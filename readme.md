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
            'appSecret' => 'your app key',
            'appSecret' => 'your app secret'
            'signSecret' => 'your sign Secret'
            'messageSecretKey' => 'your message Secret Key'
]);

// 创建授权
$app->kuaiShou->authTokenCreate();

// 部分API没有封装成具体方法，你也可以自行调用 request 方法
$app->request('请求方式','方法', ['参数'=> '值'],'授权凭证');
```

