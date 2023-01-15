<?php

namespace App\Http\Controllers\User;

use App\Actions\User\GetMyRecords;
use App\Actions\User\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

               return response(json_encode( ['error' => 'The provided credentials are incorrect.']));

        }

        return $user->createToken($request->device_name)->plainTextToken;
    }
    public function store(StoreUserRequest $request)
    {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = Hash::make($request->input('password'));

            $user = RegisterUser::run( $name , $email, $password);

            return response(json_encode(
                [
                    'user' => $user,
                    'token' => $user->createToken($request->device_name)->plainTextToken
                ]
            ));

    }

    public function getRecords(Request $request)
    {
        $records = GetMyRecords::run($request->user()->id);

        return response(json_encode($records));

    }
}
