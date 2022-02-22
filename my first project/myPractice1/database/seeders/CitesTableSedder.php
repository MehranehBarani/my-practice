<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            [
            'name' => 'Tehran' ,
            'food_id' => 1
        ] ,[
            'name' => 'Shiraz',
            'food_id' => 2
        ],[
            'name' => 'Esfehan',
            'food_id' => 3
        ],[
            'name' => 'BnadarAbass',
            'food_id' => 4
        ],[
            'name' => 'Mashhad',
            'food_id' => 5
        ]
    ]);
    }
}
