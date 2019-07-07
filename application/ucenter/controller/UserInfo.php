<?php


namespace app\ucenter\controller;


use app\base\AbstractController;
use app\ucenter\base\AbstractBaseUcenter;
use app\ucenter\manager\service\UserAccessTokenService;
use app\utils\AssertsHelper;

/**
 * @ClassName UserInfo
 * @Description 获取用户信息
 * @Author walk-code
 * @Date 2019/7/7 2:20
 * @Since php 7.2
 **/
class UserInfo extends AbstractBaseUcenter {
    /**
     * @Author walk-code
     * @Description 获取用户信息
     * @Date 2019/7/7 2:21
     * @Param
     * @return
     **/
    public function getUserInformation(UserAccessTokenService $userAccessTokenService) {
        $user = $this->getUserInfo($userAccessTokenService);

        $this->responseSuccess($user);
    }
}