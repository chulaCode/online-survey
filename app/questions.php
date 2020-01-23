<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    protected $table = 'questions';

    protected $fillable = ['number','title','question','ccode'];
}
