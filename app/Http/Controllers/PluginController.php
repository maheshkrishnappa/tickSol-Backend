<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plugin;

class PluginController extends Controller
{
    protected $plugin;
    protected $result;

    public function __construct()
    {
        $this->plugin = new Plugin();
    }

    public function index()
    {
        $this->result = $this->plugin->get();

        return response()->json([
            'status' => 200,
            'plugins' => $this->result
        ]);
    }

    public function create(Request $request)
    {
        $this->plugin->create($request->all());

        return response()->json([
           'status' => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $plugin = $this->plugin->findOrFail($id);
        $plugin->update($request->all());

        return response()->json([
            'status' => 201
        ]);
    }

    public function delete(Request $request, $id)
    {
        $plugin = $this->plugin->findOrFail($id);
        $plugin->delete();

        return response()->json([
           'status' => 204
        ]);
    }

    public function retrieve(Request $request, $id)
    {
        $this->result = $this->plugin->findOrFail($id);

        return response()->json([
           'status' => 200,
           'plugin' => $this->result
        ]);
    }
}
