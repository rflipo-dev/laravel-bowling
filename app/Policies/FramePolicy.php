<?php

namespace Bowling\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Bowling\Entity\User;
use Bowling\Entity\Frame;

class FramePolicy
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
     * Checks if an user can access frame's list
     *
     * @return boolean
     */
    public function index(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can access an frame
     *
     * @return boolean
     */
    public function show(User $authUser, Frame $frame)
    {
        return false;
    }

    /**
     * Checks if an user can add an frame
     *
     * @return boolean
     */
    public function store(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can update an frame
     *
     * @return boolean
     */
    public function update(User $authUser, Frame $frame)
    {
        return false;
    }

    /**
     * Checks if an user can remove an frame
     *
     * @return boolean
     */
    public function destroy(User $authUser, Frame $frame)
    {
        return false;
    }

}
