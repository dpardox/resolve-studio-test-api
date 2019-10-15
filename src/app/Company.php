<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    public function sources() {
        return $this->hasMany('App\Source');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
