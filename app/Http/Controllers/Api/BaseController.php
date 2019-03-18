<?php
/**
 * 基础控制器，目前只加入一个公共方法，可以拓展
 *
 * @author      fzs
 * @Time: 2017/07/14 15:57
 * @version     1.0 版本号
 */
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * 返回自定义标准json格式
     *
     * @access protected
     * @param string $lang 语言包
     * @param number $res 结果code
     * @return json
     */
    protected function resultJson($code=200,$msg,$res)
    {
        return strstr($msg,'fzs')?['msg'=>trans($msg),'status'=>$code,'data'=>$res]:['msg'=>$msg,'status'=>$code,'data'=>$res];
    }

}
