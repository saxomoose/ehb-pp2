<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is librarian and can see librarianpage.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isLibrarian(User $user)
    {
        return $user->type == 'librarian';//
    }

    /**
     * Determine whether the user is admin and can see adminpage.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isAdmin(User $user)
    {
        return $user->type == 'admin';//
    }

    /**
     * Determine whether the user is user and can see searchpage.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isUser(User $user)
    {
        return $user->type == 'user';//
    }


}
