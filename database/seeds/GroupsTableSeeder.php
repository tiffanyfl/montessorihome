<?php

use App\Group;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

    	Group::insert([
    		['name' => 'Cuisine', 'slug' => 'kitchen', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Salon', 'slug' => 'living-room', 'created_at' => $now, 'updated_at' => $now]
    	]);
    }
}
