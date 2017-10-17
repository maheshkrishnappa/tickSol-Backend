<?php

namespace App\Http\Controllers;

use App\UsersTicksol as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $user;
    protected $result;

    public function __construct()
    {
        $this->user = new User();
    }

    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users_ticksols',
            'password' => 'required|string|min:6'
        ]);

        return $validator;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails())
        {
            $errors = $validator->messages();
            return response()->json([
                'status' => 400,
                'errors' => $errors
            ]);
        }
        $this->result = $this->user->create($request->all());

        return response()->json([
           'status' => 201,
            'userId' => $this->result->id
        ]);
    }

    public function delete(Request $request, $id)
    {
        $this->result = $this->user->findOrFail($id);
        $this->result->delete();

        return response()->json([
            'status' => 204
        ]);
    }
}
