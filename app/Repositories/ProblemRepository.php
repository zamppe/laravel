<?php

namespace App\Repositories;

use App\User;
use App\Problem;

class ProblemRepository
{
    /**
     * Get all of the problems for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Problem::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

    /**
     * Get all problems
     *
     * @return Collection
     */
    public function forAll()
    {
        return Problem::all();
    }
}