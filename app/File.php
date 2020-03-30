<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    
    protected $table = 'files';
    public $timestamps = true;
    protected $fillable = array('source', 'type', 'title_ar', 'title_en', 'fileable_type', 'fileable_id');

    public function course()
    {
        return $this->morphTo();
    }
}
