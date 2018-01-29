<?php

namespace Bowling\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Bowling\Entity\User::class => \Bowling\Policies\UserPolicy::class,
        \Bowling\Entity\Game::class => \Bowling\Policies\GamePolicy::class,
        \Bowling\Entity\Frame::class => \Bowling\Policies\FramePolicy::class,
        \Bowling\Entity\Launch::class => \Bowling\Policies\LaunchPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
