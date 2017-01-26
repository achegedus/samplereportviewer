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

class ReportDetailTransformer extends TransformerAbstract
{

    public function transform(Report $report)
    {
        $output = [
            'id' => $report->id,
            'code' => $report->code,
            'name' => $report->display_name,
            'description' => $report->description,
            'version' => $report->version,
            'topic_id' => $report->topic_id,
            'group_id' => $report->group_id,
            'pattern_id' => $report->pattern_id,

            'filters' => [
                'actual' => $report->actual_bill,
                'calendarized' => $report->calendarized_bill,
                'normalized' => $report->normalized_bill,
                'quality_assurance' => $report->quality_assurance,
                'accounting' => $report->accounting,
                'facility_management' => $report->facility_management,
                'cost_avoidance' => $report->cost_avoidance,
                'compare_years' => $report->compare_years,
                'line_detail' => $report->line_detail
            ],

            'rating' => $report->rating,

            'audit' => [
                'updated_at' => $report->updated_at->toDateTimeString(),
                'created_at' => $report->created_at->toDateTimeString()
            ]
        ];

        if ($report->topic) {
            $output['topic'] = [
                'id' => $report->topic->id,
                'name' => $report->topic->name,
                'description' => $report->topic->description
            ];
        } else {
            $output['topic'] = null;
        }

        return $output;
    }
}
