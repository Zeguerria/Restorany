<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    private $fillable=[
        'nom',
        'description',
        'prix',
        'photo',
        'restaurant_id',
        'etat',
        'supprimer',
        'created_at',
        'updated_at'
    ];
    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
