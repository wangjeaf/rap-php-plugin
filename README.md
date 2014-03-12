rap-php-plugin
==============

PHP plugin for RAP

## API 

### RAP::getRapData($projectId, $url, $fn, $options)

- `$projectId` 项目ID
- `$url` Action地址
- `$fn` 获取真实数据的方法
- `$options` 配置项，目前只支持 `host` 配置

## 全局配置项

- `$RAP_FLAG` RAP开关，0 - 关闭 | 1 - 开启

## 示例

请参见 `test/index.php` 文件
