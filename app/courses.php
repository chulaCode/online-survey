<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $table = 'courses';

    protected $fillable = [];
   // 'ccode','name', 'inst_id', 'semester_id','dept_id','image','credit','max_num'
 
    public function instructor()
    {
        return $this->belongsTo(instructors::class);
    }

    public function survey()
    {
        return $this->hasOne(surveys::class);
    }
     
    public function semester()
    {
        return $this->belongsTo(semesters::class);
    }
    public function department()
    {
        return $this->belongsTo(departments::class);
    }
}
