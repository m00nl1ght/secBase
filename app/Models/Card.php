<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {
    public $timestamps = false;
    
    public function incomecard() {
        return $this->hasMany('App\Models\Incomecard');
    }
}
