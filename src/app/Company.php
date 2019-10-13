<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    public function sources() {
        return $this->hasMany('App\Source');
    }

}
