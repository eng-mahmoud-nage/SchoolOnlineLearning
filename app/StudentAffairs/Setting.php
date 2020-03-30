<?php

namespace App\StudentAffairs;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('stages_ar', 'stages_en', 'educ_admin_name_ar', 'educ_admin_name_en', 'school_name_ar', 'school_name_en', 'logo');

}