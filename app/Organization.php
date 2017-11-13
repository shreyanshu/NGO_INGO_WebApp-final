<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	
    public function project()
    {
    	return $this->belongsToMany(Project::class);
    }

    public function donor()
    {
    	return $this->belongsToMany(Donor::class);
    }
}
