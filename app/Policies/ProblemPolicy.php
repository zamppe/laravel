<?php

namespace App\Policies;

use App\User;
use App\Problem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Problem $problem
     * @return bool
     */
    public function destroy(User $user, Problem $problem)
    {
        return $user->id === $problem->user_id;
    }

    /**
     * Determine if the given user is admin
     *
     * @param  User  $user
     * @return bool
     */
    public function adminAuthorization(User $user, Problem $problem)
    {
        return $user->isAdmin();
    }    
}