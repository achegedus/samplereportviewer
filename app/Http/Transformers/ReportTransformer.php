<?php
/**
 * Created by PhpStorm.
 * User: adamh
 * Date: 12/6/16
 * Time: 3:06 PM
 */

namespace App\Http\Transformers;


use App\Models\Report;
use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{

    public function transform(Report $report) {
        return [
            'id' => $report->id,
            'code' => $report->code,
            'name' => $report->display_name,
            'description' => $report->description,
            'version' => $report->version,
            'group_id' => $report->group->id,
            'used_in' => [
                'quality_assurance' => $report->quality_assurance,
                'accounting' => $report->accounting
            ],

            'audit' => [
                'updated_at' => $report->updated_at->toDateTimeString(),
                'created_at' => $report->created_at->toDateTimeString()
            ]
        ];
    }

}