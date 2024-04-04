<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('restaurants')->insert([
            ['id'=>1, 'nom'=> "R1",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"Le R1", 'photo'=>null],
            ['id'=>2, 'nom'=> "R2",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"RZZZ", 'photo'=>null],
            ['id'=>3, 'nom'=> "R3",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"descr", 'photo'=>null],
        ]);
    }
}
