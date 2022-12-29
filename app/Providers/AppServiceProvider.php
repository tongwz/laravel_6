<?php

namespace App\Providers;

use App\Guard\SessionCustomGuard;
use App\Http\Model\UserModel;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Session\Session;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
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
        Auth::provider("customProvider", function (){
            return new EloquentSelfUserProvider(app(BcryptHasher::class), UserModel::class);
        });
        /**
         * $name = web
         * $config = array('driver' => 'customGuard', 'provider' => 'twzUser')
         */
//        Auth::extend("customGuard", function ($app, $name, $config){
//            return new SessionCustomGuard("customGuard",app(EloquentSelfUserProvider::class), app("session"));
//        });
    }
}
