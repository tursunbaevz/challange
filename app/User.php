<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'password', 'email', 'age', 'avatar', 'adress', 'city', 'region', 'zipcode', 'about', 'user_type', 'instagram', 'facebook'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function goals() {
        return $this->hasMany('App\Goal');
    }

    public function getSdoneCount(){
        return $this->goals()->where('sdone',  '=', 1)->count();
    }

    public function getIdoneCount(){
        return $this->goals()->where('idone',  '=', 1)->count();
    }

    public function getSpdoneCount(){
        return $this->goals()->where('spdone',  '=', 1)->count();
    }


    public function getTotalGoals(){
        return $this->goals()->count();
    }

    public function hasRecordToday() {
        $lastDate =  auth()->user()->goals()->orderBy("created_at", "desc")->first()->created_at->isToday();
        return $lastDate;
    }

}
