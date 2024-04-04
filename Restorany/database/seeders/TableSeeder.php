<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tables')->insert([
            ['id'=>1, 'nombre_place'=> "2", 'prix'=>"5000"],
            ['id'=>2, 'nombre_place'=> "4", 'prix'=>"10000"],
            ['id'=>3, 'nombre_place'=> "6", 'prix'=>"15000"],
            ['id'=>4, 'nombre_place'=> "8", 'prix'=>"20000"],
        ]);
    }
}
