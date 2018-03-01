<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        return Song::all();
    }

    public function show($id)
    {
        return Song::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);
        $song->update($request->all());

        return $song;
    }

    public function store(Request $request)
    {
        $song = Song::create($request->all());
        return $song;
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        return '';
    }
}
