<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportImage extends Model
{
    // Relationships
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
}
