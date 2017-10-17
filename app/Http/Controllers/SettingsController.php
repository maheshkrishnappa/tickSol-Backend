<?php

namespace App\Http\Controllers;

use App\UsersTicksol;
use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    protected $settings;
    protected $result;

    public function __construct()
    {
        $this->settings = new Settings();
    }

    public function index()
    {
        $this->result = $this->settings->get();

        return response()->json([
           'status' => 200,
           'settings' => $this->result
        ]);
    }

    public function create(Request $request)
    {
        $this->settings->create($request->all());

        return response()->json([
            'status' => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->result = $this->settings->findOrFail($id);
        $this->result->update($request->all());

        return response()->json([
           'status' => 201
        ]);
    }

    public function delete(Request $request, $id)
    {
        $this->result = $this->settings->findOrFail($id);
        $this->result->delete();

        return response()->json([
            'status' => 204
        ]);
    }

    public function retrieve(Request $request, $id)
    {
        $this->result = $this->settings->findOrFail($id);

        return response()->json([
            'status' => 200,
            'setting' => $this->result
        ]);
    }

    public function retrieveFromUser(Request $request, $userId)
    {
        $user = new UsersTicksol();
        $userObject = $user->findOrFail($userId);
        $this->result = $userObject->settings;

        return response()->json([
            'status' => 200,
            'settings' => $this->result
        ]);
    }
}