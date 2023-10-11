<?php

namespace risingsun\Helper;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 如果需要的话，你可以在这里添加路由、视图、发布命令等
    }

    public function register()
    {
        $file = __DIR__ . '/helpers.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}