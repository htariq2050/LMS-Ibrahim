<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'billing_cycle',
        'features',
    ];

    protected $casts = [
        'features' => 'array', // Ensuring features are stored as JSON
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
