<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('/index', 'index/index');

Route::get('/hello/:name', 'app\index\controller\Index@hello');
Route::get('/test/redis/:task_num_','app\index\controller\Index@testRedis');
Route::get('/test/model','app\index\controller\Index@testModel')->middleware('auth');
Route::post('/login','app\ucenter\controller\Login@login');
Route::get('/getUserInfo','app\ucenter\controller\UserInfo@getUserInformation');
return [

];
