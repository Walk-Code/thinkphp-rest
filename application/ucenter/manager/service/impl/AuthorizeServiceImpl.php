<?php


namespace app\ucenter\manager\service\impl;


use app\model\User;
use app\ucenter\manager\service\AuthorizeService;
use app\utils\AssertsHelper;

/**
 * @ClassName AuthorizeServiceImpl
 * @Description 授权相关操作逻辑 - 实现类
 * @Author walk-code
 * @Date 2019/7/6 12:45
 * @Since php 7.2
 **/
class AuthorizeServiceImpl implements AuthorizeService {

    /**
     * @Author walk-code
     * @Description 授权
     * @Date 2019/7/6 12:25
     * @Param
     * @return
     **/
    function authorize($username, $password) {
        $user = User::where('username', '=', $username)->find();
        AssertsHelper::notNull($user, '用户不存在。');
        $validateResult = $user['password'] == md5(config('constants.salt').$password);
        AssertsHelper::isTrue($validateResult, '用户名或者密码错误。');

        return $user;
    }
}