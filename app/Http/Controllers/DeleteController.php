<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __contructor()
    {
        $this->middleware('auth');
    }

    /*
        Delete user
    */
    public function delete(User $user)
    {
        $user->delete();
        return redirect(route('main_page'));
    }
}
