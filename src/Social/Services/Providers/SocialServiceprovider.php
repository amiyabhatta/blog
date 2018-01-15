<?php

namespace Social\Services\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Social\Users\Http\Controllers\UserController;
use Social\Services\Containers\UserContainer;
use Social\Models\User;

class SocialServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        
        $userModel = new User();
       
        \App::bind("Social\Services\Contracts\UserContract", function() use($userModel) {
            return new UserContainer($userModel);
        });
    }

}
