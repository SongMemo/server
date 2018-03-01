<?php

namespace App\Http\Controllers;

use App\Set;
use Illuminate\Http\Request;

class SetController extends Controller
{
    public function index()
    {
        return Set::all();
    }

    public function show(Set $set)
    {
        return $set;
    }

    public function store(Request $request)
    {
        $set = Set::create($request->all());

        return response()->json($set, 201);
    }

    public function update(Request $request, Set $set)
    {
        $set->update($request->all());

        return response()->json($set, 200);
    }

    public function delete(Set $set)
    {
        $set->delete();

        return response()->json(null, 204);
    }
}
