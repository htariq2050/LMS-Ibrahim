<?php

namespace App\Models;

class Course extends BaseModel
{
    protected $fillable = [
        'instructor_id',
        'category_id',
        'subcategory_id',
        'slug_url',
        'cover_image',
        'title',
        'description',
        'price',
        'plan_id', // Add plan_id to fillable attributes
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
