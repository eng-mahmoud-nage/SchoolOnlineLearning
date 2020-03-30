<?php

namespace App\StudentAffairs;

use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{

    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en','teacher_ar', 'teacher_en', 'classs_id', 'level_id');

    public function level()
    {
        return $this->belongsTo('App\StudentAffairs\Level', 'level_id');
    }
    public function class()
    {
        return $this->belongsTo('App\StudentAffairs\Classs', 'classs_id');
    }

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }

}