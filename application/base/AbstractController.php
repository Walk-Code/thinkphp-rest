<?php


namespace app\base;


use think\Log;

/**
 * @ClassName AbstractController
 * @Description 抽象控制器
 * @Author walk-code
 * @Date 2019/7/4 14:26
 * @Since php 7.2
 **/
class AbstractController extends AbstractRestController {
    /**
     * @Author walk-code
     * @Description 初始化参数
     * @Date 2019/7/7 2:08
     * @Param
     * @return
     **/
    function __construct() {
        // 对于依赖注入使用接口类的情况，我们需要告诉系统使用哪个具体的接口实现类来进行注入，这个使用可以把某个类绑定到接口
        bind('app\ucenter\manager\service\UserAccessTokenService', 'app\ucenter\manager\service\impl\UserAccessTokenServiceImpl');
        bind('app\ucenter\manager\service\AuthorizeService', 'app\ucenter\manager\service\impl\AuthorizeServiceImpl');
    }

    /**
     * @Author walk-code
     * @Description 获取header参数
     * 所有在header中自定义的参数 例如:自定义参数名:accessToken  那么 获取方法 $_SERVER['HTTP_ACCESSTOKEN']  所有均是大写
     * @Date 2019/7/7 22:05
     * @Param
     * @return
     **/
    function getHeader($headerKey) {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', str_replace('_', ' ', strtolower(substr($key, 5))));
            // 设置header中key得值为小写
            $headers[$header] = $value;
        }
        $headerKey = strtolower($headerKey); // 转小写

        return $headers[$headerKey];
    }
}