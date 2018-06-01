<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function products()
  {
    //product belong to many groups
  	return $this->belongsToMany('App\Product');
  }
}
