<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $fillable = [
        'date_start',
        'date_end',
        'caregiver_id',
        'contractor_id'
    ];

    protected function casts(): array
    {
        return [
            'date_start' => 'datetime',
            'date_end' => 'datetime',
        ];
    }
    
    public function contractor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'contractor_id');
    }
        
    public function caregiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'caregiver_id');
    }
}
