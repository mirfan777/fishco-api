<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Resources\ReportResource;

class ReportController extends Controller
{
    function getAllReport(Request $request) {
        $query = $request->query('search', '');
        $reports = Report::where('title', 'like', "%$query%")
                  ->paginate(5);
        return ReportResource::collection($reports);
    }

    function getReportById($id, Request $request) {
        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'message' => 'Report not found'
            ], 404);
        }

        return new ReportResource($report);
    }

    function createReport(Request $request) {
        $report = Report::create($request->all());

        return response()->json([
            'message' => 'Report created successfully',
            'data' => new ReportResource($report)
        ]);
    }

    function updateReport(Request $request, $id) {
        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'message' => 'Report not found'
            ], 404);
        }

        $report->update($request->all());

        return response()->json([
            'message' => 'Report updated successfully',
            'data' => new ReportResource($report)
        ]);
    }

    function deleteReport($id) {
        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'message' => 'Report not found'
            ], 404);
        }

        $report->delete();

        return response()->json([
            'message' => 'Report deleted successfully'
        ]);
    }
}
