<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soul extends Model
{
    protected $table = "souls";
    protected $fillable = array('goal_id', 'title', 'description');

    public function goal() {
        return $this->belongsTo('App\Goal');
    }
}
