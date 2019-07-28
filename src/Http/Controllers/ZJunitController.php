<?php
namespace Lzy\ZJunitLaravel\Http\Controllers;

// 因为是给laravel提供测试组件使用，也一样要继承laravel的符类controller
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ZJunitController extends Controller
{
    /**
     * 渲染页面
     * @return mixed
     */
    public function index()
    {
        return  view('zjunit::index');
    }

    /**
     * 提交测试的方法
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $namespace  = $request->input('namespace');
        $className  = $request->input('className');
        $action     = $request->input('action');
        $param      = $request->input('param');
        $class = ($className == "") ? $namespace : $namespace.'\\'.$className;
        // 要提换的值  需要的结果
        $class = str_replace("/", "\\", $class);
        $object = new $class();
        $param = ($param == "") ? [] : explode('|', $param) ;
        $data = call_user_func_array([$object, $action], $param);
        return (is_array($data)) ? json_encode($data) : dd($data);
    }
}