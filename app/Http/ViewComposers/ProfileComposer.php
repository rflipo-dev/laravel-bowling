<?php

namespace Bowling\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var $user
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('authUser', $this->user);
    }
}
