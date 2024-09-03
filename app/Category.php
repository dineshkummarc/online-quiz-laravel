<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function setNameAttribute($value)
    {
    	return $this->attributes['name']=ucfirst($value);
    }
}
