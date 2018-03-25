<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
  use SearchableTrait;
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 5,
            'products.details' => 5,
            'products.description' => 5,
        ],
    ];
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
