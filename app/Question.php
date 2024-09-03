<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function setQuestionAttribute($value)
    {
    	return $this->attributes['question']=ucfirst($value);
    }

    public function setOpt1Attribute($value)
    {
    	return $this->attributes['opt1']=ucfirst($value);
    }

    public function setOpt2Attribute($value)
    {
    	return $this->attributes['opt2']=ucfirst($value);
    }

    public function setOpt3Attribute($value)
    {
    	return $this->attributes['opt3']=ucfirst($value);
    }

    public function setOpt4Attribute($value)
    {
    	return $this->attributes['opt4']=ucfirst($value);
    }
}
