<?php

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 如果需要的话，你可以在这里添加路由、视图、发布命令等
    }

    public function register()
    {
        require_once __DIR__ . '/helpers.php';
    }
}