<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = ['code', 'description', 'display_name', 'version', 'rating', 'quality_assurance',
        'accounting', 'facility_management', 'cost_avoidance', 'compare_years', 'actual_bill', 'calendarized_bill',
        'normalized_bill', 'line_detail', 'pattern_id', 'topic_id', 'group_id'];

    // Relationships
    public function group() {
        return $this->belongsTo('App\Models\Group');
    }

    public function pattern() {
        return $this->belongsTo('App\Models\Pattern');
    }

    public function topic() {
        return $this->belongsTo('App\Models\Topic');
    }

    public function images() {
        return $this->hasMany('App\Models\Image');
    }
}
