<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function register(UserRegisterRequest $request)
    {
        $data = $request->all();
        $user = $this->userServices->register($data);

        return apiResponse(__('Kayıt Başarılı Bir Şekilde Oluşturuldu.'),200,['user' => $user]);
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
