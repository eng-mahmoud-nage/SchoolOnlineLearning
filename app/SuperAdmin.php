<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    protected $table = 'super_admins';
    public $timestamps = true;

    protected $fillable = array('lang', 'type');
}
