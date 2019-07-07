<?php


namespace app\utils;


use app\exception\BussinessException;

/**
 * @ClassName ResponseHelper
 * @Description 响应辅助类
 * @Author walk-code
 * @Date 2019/7/3 23:12
 * @Since php 7.2
 **/
class ResponseHelper {
    // 成功响应码
    private static $successCode = 200;

    // 错误响应码
    private static $failureCode = 500;

    /**
     * @Author walk-code
     * @Description 响应结果
     * @Date 2019/7/3 23:13
     * @Param
     * @return
     **/
    public static function failure($message) {
        throw new BussinessException(self::$failureCode, $message);
    }

    /**
     * @Author walk-code
     * @Description 响应结果
     * @Date 2019/7/4 0:37
     * @Param
     * @return
     **/
    public static function success($data) {
        throw new BussinessException(self::$successCode, '操作成功.', $data);
    }

    public static function response($code, $message, $data) {
        $responseBody            = [];
        $responseBody['status']  = $code;
        $responseBody['message'] = $message;
        $responseBody['data']    = $data;

        return response($responseBody, $code, [], 'json');
    }
}