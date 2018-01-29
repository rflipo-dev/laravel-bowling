<?php

namespace Bowling\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Bowling\Entity\User;

class UserPolicy
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
     * Checks if an user can access user's list
     *
     * @return boolean
     */
    public function index(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can access an user
     *
     * @return boolean
     */
    public function show(User $authUser, User $user)
    {
        return false;
    }

    /**
     * Checks if an user can add an user
     *
     * @return boolean
     */
    public function store(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can update an user
     *
     * @return boolean
     */
    public function update(User $authUser, User $user)
    {
        return false;
    }

    /**
     * Checks if an user can remove an user
     *
     * @return boolean
     */
    public function destroy(User $authUser, User $user)
    {
        return false;
    }

}
