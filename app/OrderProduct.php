<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  // add link into order_product table
  protected $table = 'order_product';
  protected $fillable = ['order_id', 'product_id', 'quantity'];
}
