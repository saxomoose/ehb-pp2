<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function getType($id, $newtype){
        $user = User::find($id);
        $user->type = $newtype;
        $user->save();
        return redirect()->Route('admin');
    }

    public function getDeleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->Route('admin');
    }

}
