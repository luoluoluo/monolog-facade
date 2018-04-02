## monoloe 封装

### composer安装：

```

"repositories": [
    {
        "type": "git",
        "url": "https://github.com/luoluoluo/monolog-facade"
    }
],

"require": {
    "wanshi/monolog-facade": "dev-master"
}

```

### 使用

```

use Wanshi\MonologFacade\MonologFacade as Log;
Log::info('xxx', 'yyy');

```
