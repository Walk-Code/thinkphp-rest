<?php

namespace app\index\controller;

use app\base\AbstractController;
use app\model\User;
use app\ucenter\manager\service\impl\UserAccessTokenServiceImpl;
use app\ucenter\manager\service\UserAccessTokenService;
use app\utils\AssertsHelper;

class Index extends AbstractController {
    public function index() {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
        return 1;
    }

    public function hello($name) {
        $data = [[
            'a' => 1,
            'b' => 2
        ]];
        $this->responseSuccess($data);
    }

    public function testRedis() {
        $result = redis()->set('task_num_1', 1);
        $taskId = input('task_num_');
        $num    = redis()->get('task_num_' . $taskId);
        var_dump($taskId);
        $this->responseSuccess($num);
    }

    public function testModel() {
        $user = User::where('id', '>', 0)->select();
        $this->responseSuccess($user);
    }

    public function testLogin(UserAccessTokenService $authorizeService) {
        $user = User::where('id', '>', 1)->find();

        AssertsHelper::notNull($user, "用户不存在。");
        $accessToken = $authorizeService->authAccessTokenStore($user);

        $this->responseSuccess($accessToken);
    }

}
