<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
  // add link into group_product table
    protected $table = 'group_product';

    protected $fillable = ['product_id', 'group_id'];
}
