<?php

namespace App\StudentAffairs;

use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;

class Level extends Authenticatable 
{

    protected $table = 'levels';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'user_name', 'password', 'stage_id');

    public function stage()
    {
        return $this->belongsTo('App\StudentAffairs\Stage', 'stage_id');
    }

    public function classes()
    {
        return $this->hasMany('App\StudentAffairs\Classs');
    }

    public function courses()
    {
        return $this->hasMany('App\StudentAffairs\Course');
    }

}