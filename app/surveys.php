<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{
    protected $table = 'surveys';
   protected $fillable=['ccode','studentNo','ques_id','answer','section'];

    public function course()
    {
        return $this->belongsTo(courses::class);
    }

    public function question()
    {
        return $this->belongsTo(questions::class);
    }
    
    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
