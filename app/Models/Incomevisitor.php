<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incomevisitor extends Model {
    public $timestamps = false;

    public function visitor() {
        return $this->belongsTo('App\Models\Visitor');
    }

    public function security() {
        return $this->belongsTo('App\Models\Security');
    }

    public function emploee() {
        return $this->belongsTo('App\Models\Emploee');
    }

    public function currentdate() {
        return $this->belongsTo('App\Models\Currentdate');
    }
}
