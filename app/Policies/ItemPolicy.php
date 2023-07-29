<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function view(User $user, Item $item)
    {
        //return $user->id === $item->user_id;
        if ($user->id === $item->user_id) {
            return true;
        } else {
            abort(403, 'Access denied.');
        }
    }
}
