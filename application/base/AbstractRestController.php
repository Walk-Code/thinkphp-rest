<?php


namespace app\base;


use app\utils\ResponseHelper;

/**
 * @ClassName AbstractRestController
 * @Description responess统一处理返回restful风格
 * @Author walk-code
 * @Date 2019/7/4 14:26
 * @Since php 7.2
 **/
abstract class AbstractRestController {
    /**
     * @Author walk-code
     * @Description 响应成功
     * @Date 2019/7/4 14:44
     * @Param 
     * @return 
     **/
    public function responseSuccess($message) {
        ResponseHelper::success($message);
    }


}