<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->header('token');
            if ($request->header('token')) {
                return User::where('token', $token)->first();
            }
        });
    }
}
