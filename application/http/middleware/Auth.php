<?php

namespace app\http\middleware;

use app\utils\ResponseHelper;
use think\exception\ValidateException;

class Auth {
    public function handle($request, \Closure $next) {
        $accessToken = $request->header('accessToken');
        if (empty($accessToken)) {
            return ResponseHelper::response(401, '系统检测不到授权信息,请先登录.', []);
        }
        $isExist = redis()->get(config('token.keyParamName') . $accessToken);
        if (empty($isExist)) {
            throw new ValidateException('无效参数。');
        }

        return $next($request);
    }
}
