<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $requestData = $request->all();

        $data = User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password'])
        ]);
        return apiResponse('Message',200,$data);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' =>'required|string',
        ],[
            'email.required' => 'Email alanı girilmesi zorunludur',
            'password.required' => 'Şifre alanı girilmesi zorunludur',
        ]);

        if(auth()->attempt(['email' => $request->email,'password'=>$request->password])){
            $user = auth()->user();
            $token = $user->createToken('api_case')->accessToken;
            return apiResponse(__('Giriş Yapıldı'),200,['token'=>$token,'user'=>$user]);
        }
            return apiResponse(__('UNAUTHORIZED'),401);
    }
}
