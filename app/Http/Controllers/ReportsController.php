<?php

namespace App\Http\Controllers;

use App\Http\Transformers\ReportDetailTransformer;
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

        $report_filters = Report::select();

        foreach ($inputs as $key => $value) {
            $report_filters = $report_filters->where($key, $value);
        }

        $reports = $report_filters->get();


        return $this->response->withCollection($reports, new ReportTransformer());

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
