<?php
/**
 * Created by PhpStorm.
 * User: adamh
 * Date: 12/6/16
 * Time: 3:06 PM
 */

namespace App\Http\Transformers;

use App\Models\Pattern;
use League\Fractal\TransformerAbstract;

class CounterTransformer extends TransformerAbstract
{

    public function transform(Pattern $pattern)
    {
        return [
            'pattern_id' => $pattern->id,
            'name' => $pattern->name,
            'report_count' => $pattern->reports->count()
        ];
    }
}
