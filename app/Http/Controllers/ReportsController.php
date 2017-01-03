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
        $search = $request->input('search');

        if ($search && $search != "") {
            $reports = Report::where('code','like', '%'.$search.'%')->
            orWhere('display_name','like', '%'.$search.'%')->
            paginate(15);
        } else {
            $reports = Report::paginate(15);
        }

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

        return $this->response->withItem($report, new ReportDetailTransformer());
    }


}
