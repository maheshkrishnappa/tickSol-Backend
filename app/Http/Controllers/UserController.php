<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersTicksol;

class UserController extends Controller
{
    protected $user;
    protected $result;

    public function __construct()
    {
        $this->user = new UsersTicksol();
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

    public function index(Request $request)
    {
        $this->result = $this->user->get();

        return response()->json([
            'status' => 200,
            'users' => $this->result
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->result = $this->user->findOrFail($id);
        $this->result->update($request->all());

        return response()->json([
            'status' => 201
        ]);
    }


    public function retrieve(Request $request, $id)
    {
        $this->result = $this->user->findOrFail($id);

        return response()->json([
            'status' => 200,
            'user' => $this->result
        ]);
    }
}
