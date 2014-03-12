<?php 
    // RAP标志位，应该放在全局
    $RAP_FLAG = 1;

    // 导入插件集合，目前包括Crox插件和RAP插件
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
    var_dump($crox_root);
?>