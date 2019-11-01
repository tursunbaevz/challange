<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intellect extends Model
{

    protected $table = "intellects";
    protected $fillable = array('goal_id', 'title', 'description');

    public function goal() {
        return $this->belongsTo('App\Goal');
    }


}
