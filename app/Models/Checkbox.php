<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model {
    public function act() {
        return $this->belongsToMany('App\Models\Act');
    }

    public function safetyaction() {
        return $this->hasMany('App\Models\Safetyaction');
    }
}
