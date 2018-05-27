<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 1; $i < 4; $i++){
        //     Product::create([
        //         'name' => 'Kitchen '.$i,
        //         'slug' => 'kitchen-'.$i,
        //         'details' => 'plastic',
        //         'price' => rand(85, 95),
        //         'description' => 'Lorem'.$i.' ipsum dolor sit amet'
        //     ])->groups()->attach(1);
        // }
        //
        // $product = Product::find(1);
        // $product->groups()->attach(2);
        //
        // for($i = 1; $i < 4; $i++){
        //     Product::create([
        //         'name' => 'Living Room '.$i,
        //         'slug' => 'living-room-'.$i,
        //         'details' => 'plastic',
        //         'price' => rand(85, 95),
        //         'description' => 'Lorem'.$i.' ipsum dolor sit amet'
        //     ])->groups()->attach(2);
        // }
    }
}
