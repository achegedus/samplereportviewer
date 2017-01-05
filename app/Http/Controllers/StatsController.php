<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class StatsController extends Controller
{

    public function index(Request $request)
    {
        $inputs = $request->all();

        try {
            $statusCode = 200;
            $response = [
                'data' => []
            ];

            $patterns = Pattern::all();
            foreach ($patterns as $pattern) {

                $report_count = $pattern->reports;
                foreach ($inputs as $key => $value) {
                    $report_count = $report_count->where($key, $value);
                }

                $response['data'][$pattern->name] = $report_count->count();

                $report_count = $report_count->where('quality_assurance', 1);
                $response['data']['QA'] = $report_count->count();
            }
        } catch (\Exception $e) {
            $statusCode = 400;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
