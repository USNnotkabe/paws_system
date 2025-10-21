<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'category',
        'age',
        'breed',
        'gender',
        'color',
        'description',
        'price',           // ← ADD THIS
        'listing_type',    // ← ADD THISj
        'allergies',
        'medications',
        'food_preferences',
    ];

    public function getFormattedStatusAttribute()
    {
        return ucfirst($this->status);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeAdopted($query)
    {
        return $query->where('status', 'adopted');
    }
}