<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluations extends Model
{
    protected $table = 'evaluations';

    public function course()
    {
        return $this->belongsTo(courses::class);
    }
    public function question()
    {
        return $this->belongsTo(questions::class);
    }
}
