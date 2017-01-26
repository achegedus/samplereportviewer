<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Relationships
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
}
