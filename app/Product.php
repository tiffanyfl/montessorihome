<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }
    
	public function groups()
    {
    	return $this->belongsToMany('App\Group');
    }

    public function presentPrice()
    {
        return number_format($this->price).' €';
    }

}
