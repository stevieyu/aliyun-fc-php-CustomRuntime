```sh
# 0
fun local start

fun nas init

# 1
fun nas sync

# 2
fun deploy
```

swoole 文件修改
```
lumen/vendor/hhxsv5/laravel-s/src/Illuminate/LaravelSCommand.php

base_path('storage/laravels.json') => storage_path('laravels.json')

------

lumen/vendor/hhxsv5/laravel-s/src/Console/Portal.php
$this->basePath . '/storage/laravels.json' =>  '/tmp/laravels.json'
```