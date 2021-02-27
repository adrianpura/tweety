<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        dd($user);
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
//        $this->authorize('edit',$user);
//        abort_if($user->isNot(current_user()),404);
        return view('profiles.edit', compact($user));
    }
}
