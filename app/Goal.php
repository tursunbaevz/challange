<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Goal extends Model
{
    protected $table = "goals";


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function intellects() {
        return $this->hasMany('App\Intellect');
    }

    public function souls() {
        return $this->hasMany('App\Soul');
    }

    public function sports() {
        return $this->hasMany('App\Sport');
    }

}
