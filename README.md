```sh
# 0
fun local start

fun nas init

# 1
fun nas sync

# 2
fun deploy
```

```sh
composer install --no-dev
```

lumen 文件修改
```
lumen/vendor/hhxsv5/laravel-s/src/Illuminate/LaravelSCommand.php:204

base_path('storage/ => storage_path('

------

lumen/vendor/hhxsv5/laravel-s/src/Console/Portal.php:314
$this->basePath . '/ =>  '/tmp/
```