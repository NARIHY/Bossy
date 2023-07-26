<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'birthday',
        'contact',
        'address',
        'email',
        'status',
        'subject',
        'picture',
        'action'
    ];

    /**
     * Relation Employee to Subject
     *
     * @return BelongsToMany
     */
    public function subject(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

    public function job(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }
}
