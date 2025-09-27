<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractRequest extends Model
{
    protected $fillable = [
        'contractor_description',
        'caregiver_response',
        'accepted',
        'caregiver_id',
        'contractor_id'
    ];
    
    public function caregiver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contractor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
