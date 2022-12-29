<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';
// dump($app);


/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

// echo Illuminate\Contracts\Http\Kernel::class. "\n";
/**
 * 将接口进行make 之前的app singleton中已经将Illuminate\Contracts\Http\Kernel::class,App\Http\Kernel::class
 * 进行了绑定，这样make的时候 就生成了App\Http\Kernel::class 的闭包
 */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
// dd($kernel);

/**
 * 执行了App\Http\Kernel::class 父级的handle方法 将Illuminate\Http\Request::capture() 作为实例化request作为 容器instances中的属性
 */
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
// echo "下面是response \n";
//dd($app);

/**
 * 这里返回的response是Illuminate\Http\Response 实例化对象，send是Response的父类Symfony\Component\HttpFoundation\Response 的send方法 对html进行输出
 */
$response->send();

$kernel->terminate($request, $response);
