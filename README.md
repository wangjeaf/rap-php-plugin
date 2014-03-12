rap-php-plugin
==============

PHP plugin for RAP

## 使用

1. 下载 `index.php` 文件

2. 在php中引入该文件，通过 `RAP::getRapData` 调用

## API 

### RAP::getRapData($projectId, $url, $fn, $options)

- `$projectId` 项目ID
- `$url` Action地址
- `$fn` 获取真实数据的方法
- `$options` 配置项，目前只支持 `host` 配置

## 全局配置项

- `$RAP_FLAG` RAP开关，0 - 关闭 | 1 - 开启

## 示例

```php
<?php 
    // RAP标志位，应该放在全局
    $RAP_FLAG = 1;

    // 导入RAP插件
    include 'index.php';

    // 真正的业务方法（获取真实数据）
    function getData($a, $b, $c) {
        return (object) array(
            'msg' => 'Message', 
            'code' => 'Code', 
            'data' => (object)array(
                'a' => $a, 
                'b' => $b,
                'c' => $c,
                'd' => 111,
                'e' => 222
            )
        );
    }

    // 如果业务方法要传参数，就wrapper一下
    function wrapper() {
        return getData(11, 22, 33);
    }

    // 这里，根据RAP标志获取真实数据或RAP数据，还可以通过第四个参数指定更多内容
    $crox_root = RAP::getRapData(85, '/perf/2014.json', wrapper, 
        array(
            //'root' => 'http://localhost/mock/', 
        ));

    // 打印获取的数据
    var_dump($crox_root);
?>
```
请参见 `test/index.php` 文件

