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
        return $user->type == 'librarian' || $user->type == 'superadmin';//
    }

    /**
     * Determine whether the user is admin and can see adminpage.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isAdmin(User $user)
    {
<<<<<<< HEAD
        return $user->type == 'admin'|| $user->type == 'superadmin';//
=======
        return $user->type == 'admin' || $user->type == 'superadmin';//
>>>>>>> 8dfc59c82716c160f55291ea34ec1ba5d36b56fb
    }

    /**
     * Determine whether the user is user and can see searchpage.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function isUser(User $user)
    {
<<<<<<< HEAD
        return $user->type == 'user'|| $user->type == 'superadmin';//
=======
        return $user->type == 'user' || $user->type == 'superadmin';//
>>>>>>> 8dfc59c82716c160f55291ea34ec1ba5d36b56fb
    }




}
