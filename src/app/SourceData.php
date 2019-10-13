<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceData extends Model {

    public function source() {
        return $this->belongsTo('App\Source');
    }

}
