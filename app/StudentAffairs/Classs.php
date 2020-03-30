<?php

namespace App\StudentAffairs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Classs extends Authenticatable
{

    protected $table = 'classes';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'level_id', 'active', 'user_name', 'password');

    public function level()
    {
        return $this->belongsTo('App\StudentAffairs\Level', 'level_id');
    }

    public function courses()
    {
        return $this->hasMany('App\StudentAffairs\Course');
    }

}