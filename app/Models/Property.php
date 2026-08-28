<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'titel',
        'beschrijving',
        'stad',
        'prijs_per_nacht',
        'aantal_slaapkamers',
        'aantal_bedden',
        'aantal_badkamers'
    ];
    
    public function user(): HasMany
    {
        return $this->hasMany(Property::class);
    }
    
}
