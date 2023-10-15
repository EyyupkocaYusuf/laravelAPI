<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        return apiResponse('Message',200,$data);
    }

    public function login(Request $request)
    {
        $data = $request->all();
        apiResponse('Message',200,$data);
    }
}
