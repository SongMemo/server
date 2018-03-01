<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Set;
use Illuminate\Http\Request;

class SetController extends Controller
{
    public function index()
    {
        return Set::all();
    }

    public function show($id)
    {
        return Set::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $set = Set::findOrFail($id);
        $set->update($request->all());

        return $set;
    }

    public function store(Request $request)
    {
        $set = Set::create($request->all());
        return $set;
    }

    public function destroy($id)
    {
        $set = Set::findOrFail($id);
        $set->delete();
        return '';
    }
}
