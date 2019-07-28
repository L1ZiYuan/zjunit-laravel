<?php
namespace Lzy\ZJunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ZJunitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        // 注册渲染页面地址
        $this->loadViewsFrom(
            __DIR__.'../../../resources/views', 'zjunit'
        );
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            // 域名
//            'domain' => config('telescope.domain', null),
            // 命名空间指向到控制器
            'namespace' => 'Lzy\ZJunitLaravel\Http\Controllers',
            // 前缀
            'prefix' => 'qjunit',
            // 中间件
            'middleware' => 'web',
        ];
    }
    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'../../Http/routes.php');
        });
    }

}