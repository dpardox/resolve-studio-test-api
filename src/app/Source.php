<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model {

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function data() {
        return $this->hasMany('App\SourceData');
    }

}
