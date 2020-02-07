<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];
    
    public function priority()
    {
        // return $this->hasOne('App\Priority');
        return $this->belongsTo('App\Priority');
    }

    public function Project()
    {
        return $this->belongsTo('App\Project');
    }
    
    
}
