<?php
/**
 * Created by PhpStorm.
 * User: adamh
 * Date: 12/6/16
 * Time: 3:06 PM
 */

namespace App\Http\Transformers;


use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{

    public function transform($report) {
        return [
            'id' => $report->id,
            'code' => $report->code,
            'name' => $report->display_name,
            'description' => $report->description,
            'version' => $report->version,
            'updated_at' => $report->updated_at->toDateTimeString()
        ];
    }


}