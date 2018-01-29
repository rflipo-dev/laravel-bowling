<?php

namespace Bowling\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Bowling\Entity\User;
use Bowling\Entity\Launch;

class LaunchPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Checks if an user can access launch's list
     *
     * @return boolean
     */
    public function index(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can access an launch
     *
     * @return boolean
     */
    public function show(User $authUser, Launch $launch)
    {
        return false;
    }

    /**
     * Checks if an user can add an launch
     *
     * @return boolean
     */
    public function store(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can update an launch
     *
     * @return boolean
     */
    public function update(User $authUser, Launch $launch)
    {
        return false;
    }

    /**
     * Checks if an user can remove an launch
     *
     * @return boolean
     */
    public function destroy(User $authUser, Launch $launch)
    {
        return false;
    }

}
