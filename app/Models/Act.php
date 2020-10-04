<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Act extends Model {
    public function checkbox() {
        return $this->belongsToMany('App\Models\Checkbox');
    }

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }

    public function visitor() {
        return $this->belongsTo('App\Models\Visitor');
    }
}
