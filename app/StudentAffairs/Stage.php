<?php

namespace App\StudentAffairs;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model 
{

    protected $table = 'stages';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'active');

    public function levels()
    {
        return $this->hasMany('App\StudentAffairs\Level');
    }

}