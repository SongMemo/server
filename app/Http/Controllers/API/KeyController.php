<?php

namespace App\Http\Controllers;

use App\Key;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index()
    {
        return Key::all();
    }

    public function show(Key $key)
    {
        return $key;
    }

    public function store(Request $request)
    {
        $key = Key::create($request->all());

        return response()->json($key, 201);
    }

    public function update(Request $request, Key $key)
    {
        $key->update($request->all());

        return response()->json($key, 200);
    }

    public function delete(Key $key)
    {
        $key->delete();

        return response()->json(null, 204);
    }
}
