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
                $querystring = "";
                foreach ($inputs as $key => $value) {
                    $report_count = $report_count->where($key, $value);
                    $querystring = $querystring . $key . "=" . $value . "&";
                }

                $outPattern = new \stdClass();
                $outPattern->name = $pattern->name;
                $outPattern->desc = $pattern->description;
                $outPattern->report_count = $report_count->count();

                $querystring = $querystring . "pattern=" . $pattern->name;

                $outPattern->query = $querystring;

                $response['data'][] = $outPattern;

//                $report_count = $report_count->where('quality_assurance', 1);
//                $response['data']['QA'] = $report_count->count();
            }
        } catch (\Exception $e) {
            $statusCode = 400;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
