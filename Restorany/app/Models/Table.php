<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    private $fillable=[
        'nombre_place',
        'prix',
        'supprimer',
        'created_at',
        'updated_at'
    ];
    // public function reservations(){
    //     return $this->hasMany(Reservation::class, 'table_id');
    // }
}
