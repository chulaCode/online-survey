<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'dept_id';
    
    public function chair()
    {
        return $this->belongsTo(chairs::class);
    }
}
