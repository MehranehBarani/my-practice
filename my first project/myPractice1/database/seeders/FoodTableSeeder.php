<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('food')->insert([
            [
            'name' => 'tahini' ,
            'cost' => '30000',
            'picture' => 'default.pnj',
            'rate' => '0'
        ] ,[
            'name' => 'pizza' ,
            'cost' => '100000',
            'picture' => 'default.pnj',
            'rate' => '0'
        ] ,[
            'name' => 'hambergar' ,
            'cost' => '60000',
            'picture' => 'default.pnj',
            'rate' => '0'
        ] ,[
            'name' => 'soshi' ,
            'cost' => '80000',
            'picture' => 'default.pnj',
            'rate' => '0'
        ] ,[
            'name' => 'goboli' ,
            'cost' => '90000',
            'picture' => 'default.pnj',
            'rate' => '0'
        ]
    
        ]);
    }
}
