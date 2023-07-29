<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    // public function view(User $user, Category $category)
    // {

    //     if ($user->id === $category->user_id) {
    //         return true;
    //     } else {
    //         abort(403, 'Access denied.');
    //     }
    // }
    public function view(User $user, Category $category)
    {
        return $user->id === $category->user_id;
    }
}
