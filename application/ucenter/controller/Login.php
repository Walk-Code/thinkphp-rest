<?php


namespace app\ucenter\controller;


use app\base\AbstractController;
use app\ucenter\manager\service\AuthorizeService;
use app\ucenter\manager\service\impl\AuthorizeServiceImpl;
use app\ucenter\manager\service\impl\UserAccessTokenServiceImpl;
use app\ucenter\manager\service\UserAccessTokenService;

/**
 * @ClassName Login
 * @Description 登录相关操作 - 控制器
 * @Author walk-code
 * @Date 2019/7/6 12:15
 * @Since php 7.2
 **/
class Login extends AbstractController {

    /**
     * @Author walk-code
     * @Description 登录
     * @Date 2019/7/6 12:18
     * @Param
     * @return
     **/
    public function login(AuthorizeService $authorizeService, UserAccessTokenService $userAccessTokenService) {
        $username    = input('username');
        $password    = input('password');
        $user        = $authorizeService->authorize($username, $password);
        $accessToken = $userAccessTokenService->authAccessTokenStore($user);

        $this->responseSuccess($accessToken);
    }
}