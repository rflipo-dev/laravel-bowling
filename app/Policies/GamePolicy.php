<?php

namespace Bowling\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Bowling\Entity\User;
use Bowling\Entity\Game;

class GamePolicy
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
     * Checks if an user can access game's list
     *
     * @return boolean
     */
    public function index(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can access an game
     *
     * @return boolean
     */
    public function show(User $authUser, Game $game)
    {
        return false;
    }

    /**
     * Checks if an user can add an game
     *
     * @return boolean
     */
    public function store(User $authUser)
    {
        return false;
    }

    /**
     * Checks if an user can update an game
     *
     * @return boolean
     */
    public function update(User $authUser, Game $game)
    {
        return false;
    }

    /**
     * Checks if an user can remove an game
     *
     * @return boolean
     */
    public function destroy(User $authUser, Game $game)
    {
        return false;
    }

}
