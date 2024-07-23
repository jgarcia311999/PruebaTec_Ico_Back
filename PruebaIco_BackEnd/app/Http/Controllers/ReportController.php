<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Report::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'runner_id' => 'required|exists:runners,id',
            'reported_km' => 'required|integer',
            'document' => 'sometimes|string|max:255|nullable',
            'comment' => 'sometimes|string|max:255|nullable',
            'date' => 'required|date',
        ]);

        $report = Report::create($validatedData);

        return response()->json($report, 201);
    }

    public function show($id)
    {
        return Report::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $validatedData = $request->validate([
            'runner_id' => 'sometimes|exists:runners,id',
            'reported_km' => 'sometimes|integer',
            'document' => 'sometimes|string|max:255|nullable',
            'comment' => 'sometimes|string|max:255|nullable',
            'date' => 'sometimes|date',
        ]);

        $report->update($validatedData);

        return response()->json($report, 200);
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return response()->json(null, 204);
    }
}