<?php

use App\Priority;
use App\Task;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Priority::create([
            "name" => "High"
        ]);
        Priority::create([
            "name" => "Medium"
        ]);
        Priority::create([
            "name" => "Low"
        ]);


    }
}
