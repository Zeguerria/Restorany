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
            ['id'=>1, 'nom'=> "R1",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"belle etoile", 'photo'=>'public/stockages/images/restaurants/jQQH9mldfZFRFK3uRRlYFFNhPEliI9UF7i6zHu3B.jpg'],
            ['id'=>2, 'nom'=> "R2",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"artis", 'photo'=>'public/stockages/images/restaurants/eXQhbO2jACw7MM4x60gnIGpieCLFW8exXgLq1Lb5.jpg'],
            ['id'=>3, 'nom'=> "R3",'phone'=> "00009999",'quartier'=> "R1", 'description'=>"nemo", 'photo'=>'public/stockages/images/restaurants/Gb8sG8QtNy9I6kK9RfTzrMAfdYdCj7Yb0BClStYa.jpg'],
        ]);
    }
}
