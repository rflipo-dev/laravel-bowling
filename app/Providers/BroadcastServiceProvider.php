<?php

namespace Bowling\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes([
            'middleware' => ['cors', 'auth:api'],
            'prefix' => 'v1',
            'domain' => config('app.api_endpoint')
        ]);

        require base_path('routes/channels.php');
    }
}
