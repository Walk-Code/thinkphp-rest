<?php


namespace app\ucenter\manager\service\impl;


use app\model\User;
use app\ucenter\manager\service\UserAccessTokenService;
use app\utils\AssertsHelper;

/**
 * @ClassName UserAccessTokenServiceImpl
 * @Description 用户accessToken相关操作逻辑 - 具体实现类
 * @Author walk-code
 * @Date 2019/7/6 0:48
 * @Since php 7.2
 **/
class UserAccessTokenServiceImpl implements UserAccessTokenService {

    /**
     * @Author walk-code
     * @Description 用户授权accessToken存储
     * @Date 2019/7/6 0:44
     * @Param
     * @return
     **/
    function authAccessTokenStore($user) {
        $userJson = json_encode($user);
        $accessToken = $this->createAccessTokenValue($userJson);
        $accessTokenKey = $this->createAccessTokenKey($accessToken);
        $result = redis()->set($accessTokenKey, $userJson, config('token.expiredSeconds'));
        AssertsHelper::isTrue($result, '用户授权失败，请退出重试。');

        return $accessToken;
    }

    /**
     * @Author walk-code
     * @Description 获取用户登录信息
     * @Date 2019/7/6 0:46
     * @Param
     * @return
     **/
    function getUserInfo($accessToken) {
        $accessTokenKey = $this->createAccessTokenKey($accessToken);
        $userJson = redis()->get($accessTokenKey);
        AssertsHelper::isTrue($userJson, '用户还未登录。');

        return json_decode($userJson);
    }

    /**
     * @Author walk-code
     * @Description 生成accessToken 生成规则用户信息+6位随机数，然后md5
     * @Date 2019/7/6 0:50
     * @Param
     * @return
     **/
    private function createAccessTokenValue($userJson) {
        $accessToken = md5($userJson);

        return $accessToken;
    }

    /**
     * @Author walk-code
     * @Description 生成accessToken key 以应用的名称+accessToken的值组成
     * @Date 2019/7/6 0:55
     * @Param
     * @return
     **/
    private function createAccessTokenKey($accessToken) {
        return config('token.keyParamName'). $accessToken;
    }
}