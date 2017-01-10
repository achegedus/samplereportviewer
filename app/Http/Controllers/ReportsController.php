<?php

namespace App\Http\Controllers;

use App\Http\Transformers\ReportDetailTransformer;
use App\Models\Pattern;
use App\Models\Report;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Http\Transformers\ReportTransformer;
use League\Fractal\Manager;


class ReportsController extends Controller
{
    protected $response;

    /**
     * @param Response $response
     * @internal param $Response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function index(Request $request)
    {
        $inputs = $request->all();

        try {
            $statusCode = 200;


            if (!$request->input('pattern') || $request->input('pattern') == "") {
                $reportlist = Report::query();

                foreach ($inputs as $key => $value) {
                    if ($key != 'pattern' && $key != 'page') {
                        $reportlist = $reportlist->where($key, $value);
                    }
                }

                $response['data'] = $reportlist->paginate(15);
            } else {

                if ($request->input('pattern') != "QA") {

                    $pattern = Pattern::where('name', $request->input('pattern'))->first();

                    $reportlist = Report::where('pattern_id', $pattern->id);

                    foreach ($inputs as $key => $value) {
                        if ($key != 'pattern' && $key != 'page') {
                            $reportlist = $reportlist->where($key, $value);
                        }
                    }

                    $response['data'] = $reportlist->paginate(15);
                } else {
                    // QA
                    $reportlist = Report::where('quality_assurance', 1);

                    foreach ($inputs as $key => $value) {
                        if ($key != 'pattern' && $key != 'page') {
                            $reportlist = $reportlist->where($key, $value);
                        }
                    }

                    $response['data'] = $reportlist->paginate(15);
                }
            }

        } catch (\Exception $e) {
            $statusCode = 400;
        } finally {
            return response()->json($response, $statusCode);
        }
    }


    /**
     * @param $id
     * @return mixed
     * @internal param Report $report
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        return $this->response->withItem($report, new ReportDetailTransformer());
    }


}
