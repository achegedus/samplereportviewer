<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Transformers\PatternTransformer;
use App\Models\Pattern;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;

class PatternsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $statusCode = 200;
            $response = [
                'data' => []
            ];

            $patterns = Pattern::all();

            $response['data'] = $patterns;

        } catch (\Exception $e) {
            $statusCode = 400;
        } finally {
            return response()->json($response, $statusCode);
        }
    }


    public function show($id)
    {
        //
        try {
            $statusCode = 200;
            $response = [
                'data' => []
            ];

            $pattern = Pattern::where('name', $id);

            $response['data'] = $pattern;

        } catch (\Exception $e) {
            $statusCode = 400;
        } finally {
            return response()->json($response, $statusCode);
        }

    }

}
