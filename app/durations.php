<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class durations extends Model
{
    protected $table="durations";
    protected $fillable=['ques_id','answer','ccode','studentNo'];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
