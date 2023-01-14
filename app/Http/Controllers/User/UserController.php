<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken($request->device_name)->plainTextToken;
    }
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]); 
        
            $data = $request->all();
            
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
         
            return response(json_encode(
                [
                    'user' => $user,
                    'token' => $user->createToken($request->device_name)->plainTextToken
                ]
            ));
        
    }
}
