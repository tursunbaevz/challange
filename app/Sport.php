<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{

    protected $table = "sports";
    protected $fillable = array('goal_id', 'title', 'description');

    public function goal() {
        return $this->belongsTo('App\Goal');
    }
}
