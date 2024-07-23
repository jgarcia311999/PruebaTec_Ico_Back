<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        return Training::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'runner_id' => 'required|exists:runners,id',
            'start_date' => 'required|date',
            'frequency' => 'required|string|max:255',
            'assigned_km' => 'required|integer',
        ]);

        $training = Training::create($validatedData);

        return response()->json($training, 201);
    }

    public function show($id)
    {
        return Training::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $validatedData = $request->validate([
            'runner_id' => 'sometimes|exists:runners,id',
            'start_date' => 'sometimes|date',
            'frequency' => 'sometimes|string|max:255',
            'assigned_km' => 'sometimes|integer',
        ]);

        $training->update($validatedData);

        return response()->json($training, 200);
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return response()->json(null, 204);
    }
}