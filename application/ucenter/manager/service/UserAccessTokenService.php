<?php


namespace app\ucenter\manager\service;

use app\model\User;

/**
 * @Author walk-code
 * @Description 授权相关操作逻辑 - 接口类
 * @Date 2019/7/5 19:25
 * @Param
 * @return
 **/
interface UserAccessTokenService {
    /**
     * @Author walk-code
     * @Description 用户授权accessToken存储
     * @Date 2019/7/6 0:44
     * @Param 
     * @return 
     **/
    function authAccessTokenStore($user);

    /**
     * @Author walk-code
     * @Description 获取用户登录信息
     * @Date 2019/7/6 0:46
     * @Param
     * @return
     **/
    function getUserInfo($accessToken);
}