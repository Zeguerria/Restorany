<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('plats')->insert([
            ['id'=>1, 'nom'=> "R1azzzzz",'prix'=> "00009999",'restaurant_id'=> 1, 'description'=>"Le R1", 'photo'=>null],
            ['id'=>2, 'nom'=> "R2ffffdddd",'prix'=> "00009999",'restaurant_id'=>2,  'description'=>"RZZZ", 'photo'=>null],
            ['id'=>3, 'nom'=> "R3qqqqqqmqm",'prix'=> "00009999",'restaurant_id'=>2, 'description'=>"descr", 'photo'=>null],
            ['id'=>4, 'nom'=> "vnvnvn,s,",'prix'=> "112221111", 'restaurant_id'=>3, 'description'=>"descr flglgl dldldl elrlrlr", 'photo'=>null],
            ['id'=>5, 'nom'=> "aaeaellxlxlx",'prix'=> "001999009999",'restaurant_id'=>1,'description'=>"descr", 'photo'=>null],
        ]);
    }
}
