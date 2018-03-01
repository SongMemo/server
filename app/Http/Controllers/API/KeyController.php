<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Key;

class KeyController extends Controller
{
    public function index()
    {
        return Key::all();
    }

    public function show($id)
    {
        return Key::findOrFail($id);
    }
}
