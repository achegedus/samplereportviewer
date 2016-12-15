<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Http\Transformers\ReportTransformer;


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
    public function index()
    {
        $reports = Report::paginate(15);

        return $this->response->withPaginator($reports, new ReportTransformer());
    }


    /**
     * @param Report $report
     */
    public function show(Report $report)
    {

    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }


    /**
     * @param Request $request
     * @param Report $report
     */
    public function update(Request $request, Report $report)
    {

    }


    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {

    }
}
