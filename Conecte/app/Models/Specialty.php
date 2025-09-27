<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialty extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function caregiver(): belongsToMany
    {
        return $this->belongsToMany(Caregiver::class);
    }
}
