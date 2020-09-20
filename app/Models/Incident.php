<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model {
    public $timestamps = false;
    
    public function currentdate() {
        return $this->belongsTo('App\Models\Currentdate');
    }
}
