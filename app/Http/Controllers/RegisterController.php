<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource as UserResource;

class RegisterController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return new UserResource($user);
    }
}
