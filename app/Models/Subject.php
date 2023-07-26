<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    /**
     * Relation Subject to Employe
     *
     * @return BelongsToMany
     */
    public function employe(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
