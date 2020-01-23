<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assigns extends Model
{
    protected $table = 'assigns';

    protected $fillable = [
        'studentNo','studentName', 'ccode', 'courseName'
    ];
    
    public function course()
    {
        return $this->belongsTo(courses::class);
    }
    public function student()
    {
        return $this->belongTo(students::class);
    }
}
