<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotaleEcolage extends Model
{
    use HasFactory;

    protected $fillable = [
        'anne_detude',
        'classe',
        'prix'
    ];

    public function classe()
    {
        return $this->belongsToMany(Classe::class);
    }
}
