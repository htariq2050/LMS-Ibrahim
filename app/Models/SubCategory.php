<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'description','category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
