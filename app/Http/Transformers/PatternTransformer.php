<?php
/**
 * Created by PhpStorm.
 * User: adamh
 * Date: 12/6/16
 * Time: 3:06 PM
 */

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class PatternTransformer extends TransformerAbstract
{

    public function transform($group)
    {
        return [
            'id' => $group->id,
            'name' => $group->name,
            'description' => $group->description
        ];
    }
}
