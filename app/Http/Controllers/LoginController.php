<?php

namespace App\Http\Controllers;

use App\UsersTicksol as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected $user;
    protected $result;

    public function __construct()
    {
        $this->user = new User();
    }

    protected function validator($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required'
        ]);

        return $validator;
    }

    public function login(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails())
        {
            $errors = $validator->messages();
            return response()->json(['errors' => $errors,
                'status' => '400'
            ]);
        }

        $email = $request['email'];
        $password = $request['password'];
        $loginDetails = ['email' => $email, 'password' => $password];
        $this->result = $this->user->where($loginDetails)->get();

        if($this->result->count() == 1)
        {
            return response()->json([
                'status' => 200,
                'login' => 'true',
                'user' => $this->result
            ]);
        }
        else
        {
            return response()->json([
               'status' => 400,
               'login' => 'false',
               'error' => 'User not found in the system'
            ]);
        }

    }
}
