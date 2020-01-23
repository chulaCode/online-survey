<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ects extends Model
{
    protected $table = 'ects';
    
    public function course()
    {
        return $this->belongsTo(courses::class);
    }
}
