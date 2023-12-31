<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    public function etudiant()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function totale_ecolage()
    {
        return $this->belongsToMany(TotaleEcolage::class);
    }

    public function ecolage()
    {
        return $this->belongsToMany(Ecolage::class);
    }
}
