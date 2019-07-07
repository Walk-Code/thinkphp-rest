<?php


namespace app\ucenter\manager\service;

/**
 * @Author walk-code
 * @Description 授权相关操作逻辑 - 接口类
 * @Date \ 12:24
 * @Param
 * @return
 **/
interface AuthorizeService {
    /**
     * @Author walk-code
     * @Description 授权
     * @Date 2019/7/6 12:25
     * @Param
     * @return
     **/
    function authorize($username, $password);
}