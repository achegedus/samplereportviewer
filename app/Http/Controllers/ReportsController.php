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
     * @param $id
     * @return mixed
     * @internal param Report $report
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        return $this->response->withItem($report, new ReportTransformer());
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        Report::create($request->all());
    }


    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @internal param Report $report
     */
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $report->update($request->all());

        return $this->response->withItem($report, new ReportTransformer());
    }


    /**
     * @param $id
     * @internal param Request $request
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        $report->delete();
    }
}
