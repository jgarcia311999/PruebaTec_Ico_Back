<?php

namespace App\Http\Controllers;

use App\Models\Runner;
use Illuminate\Http\Request;

class RunnerController extends Controller
{
    public function index()
    {
        return Runner::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'email' => 'required|string|email|max:255|unique:runners',
            'total_km' => 'required|integer',
        ]);

        $runner = Runner::create($validatedData);

        return response()->json($runner, 201);
    }

    public function show($id)
    {
        return Runner::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $runner = Runner::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'team_id' => 'sometimes|exists:teams,id',
            'email' => 'sometimes|string|email|max:255|unique:runners,email,' . $id,
            'total_km' => 'sometimes|integer',
        ]);

        $runner->update($validatedData);

        return response()->json($runner, 200);
    }

    public function destroy($id)
    {
        $runner = Runner::findOrFail($id);
        $runner->delete();

        return response()->json(null, 204);
    }
}