<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    public $timestamps = false;
    
    public function incomevisitor() {
        return $this->hasMany('App\Models\Incomevisitor');
    }

    public function incomecar() {
        return $this->hasMany('App\Models\Incomecar');
    }
}
