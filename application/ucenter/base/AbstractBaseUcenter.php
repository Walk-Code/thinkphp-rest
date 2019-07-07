<?php


namespace app\ucenter\base;


use app\base\AbstractController;
use app\ucenter\manager\service\AuthorizeService;
use app\ucenter\manager\service\UserAccessTokenService;

/**
 * @ClassName AbstractBaseUcenter
 * @Description 统一认证基础控制器(封装了基本的用户信息查询方法)
 * @Author walk-code
 * @Date 2019/7/7 21:51
 * @Since php 7.2
 **/
class AbstractBaseUcenter extends AbstractController {

    /**
     * @Author walk-code
     * @Description 获取用户信息
     * @Date 2019/7/7 21:59
     * @Param
     * @return
     **/
    public function getUserInfo(UserAccessTokenService $userAccessTokenService) {
        $accessToken = $this->getAccessToken();

        return $userAccessTokenService->getUserInfo($accessToken);
    }

    /**
     * @Author walk-code
     * @Description 获取客户端请求得accessToken值
     * @Date 2019/7/7 21:59
     * @Param
     * @return
     **/
    private function getAccessToken() {
        $accessToken = $this->getHeader('accessToken');

        return $accessToken;
    }

}