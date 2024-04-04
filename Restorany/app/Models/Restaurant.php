<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'nom',
        'description',
        'photo',
        'phone',
        'quartier',
        'supprimer',
        'created_at',
        'updated_at'
    ];
    public function plats(){
        return $this->hasMany(Plat::class, 'restaurant_id');
    }
    public function getLeProfilAttribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo']);
    }
}
