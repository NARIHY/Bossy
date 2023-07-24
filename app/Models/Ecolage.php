<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecolage extends Model
{
    use HasFactory;

    public function classe()
    {
        return $this->belongsToMany(Classe::class);
    }
}
