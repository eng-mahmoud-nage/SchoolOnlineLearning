<?php

namespace App\StudentAffairs;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable 
{
    use HasRoles;

    protected $table = 'admins';
    public $timestamps = true;

    protected $fillable = array('name_ar', 'name_en', 'email', 'password', 'active');
    protected $hidden = array('password');
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}