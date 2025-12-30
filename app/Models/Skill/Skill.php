<?php

namespace App\Models\Skill;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
