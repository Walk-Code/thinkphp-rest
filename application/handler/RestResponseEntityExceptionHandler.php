<?php


namespace app\handler;


use app\exception\BussinessException;
use app\utils\ResponseHelper;
use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

/**
 * @ClassName RestResponseEntityExceptionHandler
 * @Description 全局异常处理类
 * @Author walk-code
 * @Date 2019/7/3 22:32
 * @Since php 7.2
 **/
class RestResponseEntityExceptionHandler extends Handle {
    /**
     * @Author walk-code
     * @Description 相关异常处理
     * 200: OK。一切正常。
     * 201: 响应 POST 请求时成功创建一个资源。Location header 包含的URL指向新创建的资源。
     * 204: 该请求被成功处理，响应不包含正文内容 (类似 DELETE 请求)。
     * 304: 资源没有被修改。可以使用缓存的版本。
     * 400: 错误的请求。可能通过用户方面的多种原因引起的，例如在请求体内有无效的JSON 数据，无效的操作参数，等等。
     * 401: 验证失败。
     * 403: 已经经过身份验证的用户不允许访问指定的 API 末端。
     * 404: 所请求的资源不存在。
     * 405: 不被允许的方法。 请检查 Allow header 允许的HTTP方法。
     * 415: 不支持的媒体类型。 所请求的内容类型或版本号是无效的。
     * 422: 数据验证失败 (例如，响应一个 POST 请求)。 请检查响应体内详细的错误消息。
     * 429: 请求过多。 由于限速请求被拒绝。
     *  500: 内部服务器错误。 这可能是由于内部程序错误引起的。
     * @Date 2019/7/3 22:41
     * @Param
     * @return
     **/
    public function render(Exception $e) {
        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {
            return ResponseHelper::response($e->getStatusCode(), $e->getMessage(), []);
        }

        // 参数验证错误
        if ($e instanceof ValidateException) {
            //return response($e->getMessage(), 422,[],'json');
            return ResponseHelper::response(422, $e->getMessage(), []);
        }

        // 业务异常
        if ($e instanceof BussinessException) {
            return ResponseHelper::response($e->getCode(), $e->getMessage(), $e->getData());
        }

        return ResponseHelper::response(500, $e->getMessage(), []);
        /*return parent::render($e);*/
    }
}