<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenon',
        'matricule',
        'promotion',
        'picture',
        'classe',
        'anne_detude'
    ];

    public function classe()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function promotion()
    {
        return $this->belongsToMany(Promotion::class);
    }
}
