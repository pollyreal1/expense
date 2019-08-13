<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\User;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        $User = new User();

        $User = $User->where([
            'email' => $request->email,
            'password' => $request->password,
        ])->first();

        if($User){

            $data = [
                'data' => $User,
                'status' => 'success',
            ];

        }else{

            $data = [
                'data' => false,
                'status' => 'failed',
            ];

        }
        return response()->json($data);

    }
}
